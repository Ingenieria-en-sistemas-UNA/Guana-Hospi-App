<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QueryRepository;
use App\Repositories\UnityRepository;
use App\Repositories\PatientRepository;
use App\Repositories\DiseaseRepository;
use App\Repositories\InterventionTypeRepository;
use App\Repositories\InterventionRepository;
use App\Repositories\SuffersRepository;
use Illuminate\Support\Facades\Hash;

class QueryController extends Controller
{
    /** @var QueryRepository */
    private $queryRepository;

    /** @var UnityRepository */
    private $unityRepository;

    /** @var PatientRepository */
    private $patientRepository;

    /** @var DiseaseRepository */
    private $diseaseRepository;

    /** @var InterventionRepository */
    private $interventionRepository;

    /** @var InterventionTypeRepository */
    private $interventionTypeRepository;

    /** @var SuffersRepository */
    private $suffersRepository;

    
    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(
        QueryRepository $queryRepository,
        UnityRepository $unityRepository,
        PatientRepository $patientRepository,
        DiseaseRepository $diseaseRepository,
        InterventionTypeRepository $interventionTypeRepository,
        InterventionRepository $interventionRepository,
        SuffersRepository $suffersRepository
    ) {
        $this->middleware('auth');
        $this->queryRepository = $queryRepository;
        $this->unityRepository = $unityRepository;
        $this->patientRepository = $patientRepository;
        $this->diseaseRepository = $diseaseRepository;
        $this->interventionTypeRepository = $interventionTypeRepository;
        $this->interventionRepository = $interventionRepository;
        $this->suffersRepository = $suffersRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queries = $this->queryRepository->all();
        return view('pages.query.index', array('queries' => $queries));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = $this->unityRepository->all();
        $patients = $this->patientRepository->all();
        $diseases = $this->diseaseRepository->all();
        $interTypes = $this->interventionTypeRepository->all();
        $interventions = $this->interventionRepository->all();
        $suffers = $this->suffersRepository->all();
        return view('pages.query.create', array(
            'responseError' => false, 'units' => $units,
            'patients' => $patients, 'diseases' => $diseases, 'interTypes' => $interTypes, 'interventions' => $interventions, 'suffers' => $suffers
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'Id_Unidad' => 'required|numeric',
            'Id_Paciente' => 'required|numeric',
            'descripcion' => 'required|string|max:255'
        );

        $this->validate($request, $rules, $this->customMessages);
        $query = array(
            $request->descripcion,
            $request->Id_Paciente,
            $request->Id_Unidad
        );
        $response = $this->queryRepository->create($query);

        if (!$response[0]->ok) {
            return view('pages.query.create', array('responseError' => $response[0]->message));
        }

        $Id_Consulta = $response[0]->beforeId == 1 ? 1 : $response[0]->currentId;

        if ($request->intervenciones) {
            foreach ($request->intervenciones as $intervencion) {
                $interv = array(
                    $intervencion['description'],
                    $intervencion['id_tipo_intervencion'],
                    $Id_Consulta
                );
                $response = $this->interventionRepository->create($interv);
                if(!$response[0]->ok){
                    $this->queryRepository->delete($Id_Consulta);
                    return view('pages.query.create', array('responseError' => $response[0]->message));
                }
            }
        }
        $suffersSelected = $request->enfermedades;
        foreach ($suffersSelected as $suffersId) {
            if ($suffersId != null) {
                $suffers = $this->suffersRepository->create(array($request->Id_Paciente, $suffersId));
                if (!$suffers[0]->ok) {
                    $enfermedades = $this->suffersRepository->all();
                    return view('pages.query.create', array(
                        'responseError' => $suffers[0]->message,
                        'enfermedades' => $enfermedades
                    ));
                }
            }
        }

        return redirect('/queries')->with('success', 'Consulta creada!');
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Paciente
     */
    public function show($consulta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->queryRepository->find($id);
        if (!$response[0]->ok) {
            return redirect('/queries')->with('error', 'Error: ' . $response[0]->message);
        }
        $units = $this->unityRepository->all();
        $patients = $this->patientRepository->all();
        $diseases = $this->diseaseRepository->all();
        $interTypes = $this->interventionTypeRepository->all();
        $diseasesPatient = $this->diseaseRepository->findDisPacientId($response[0]->Id_Paciente);
        $intervencionesConsultas = $this->interventionRepository->findInterventionByQueryId($id);
        $tipoIntervencionesConsultas = $this->interventionTypeRepository->findIntervByIdQuery($id);
        return view('pages.query.edit', array(
            'responseError' => false,
            'units' => $units,
            'patients' => $patients,
            'diseases' => $diseases,
            'interTypes' => $interTypes,
            'intervencion' => $response[0],
            'diseasesPatient' => $diseasesPatient,
            'intervencionesConsultas' => $intervencionesConsultas,
            'tipoIntervencionesConsultas' => $tipoIntervencionesConsultas
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'Id_Unidad' => 'required|numeric',
            'Id_Paciente' => 'required|numeric',
            'descripcion' => 'required|string|max:255'
        );

        $this->validate($request, $rules, $this->customMessages);
        $query = array(
            $id,
            $request->descripcion,
            $request->Id_Paciente,
            $request->Id_Unidad
        );
        $response = $this->queryRepository->update($query);

        if (!$response[0]->ok) {
            return view('pages.query.edit', array('responseError' => $response[0]->message));
        }
        //Eliminar intervenciones por ID consulta

        if ($request->intervenciones) {
            foreach ($request->intervenciones as $intervencion) {
                $interv = array(
                    $intervencion['description'],
                    $intervencion['id_tipo_intervencion'],
                    $id
                );
                $response = $this->interventionRepository->create($interv);                
                if(!$response[0]->ok){                    
                    return view('pages.query.create', array('responseError' => $response[0]->message));
                }
            }
        }
        //eliminar enfermedades por ID paciente
        $suffersSelected = $request->enfermedades;
        foreach ($suffersSelected as $suffersId) {
            if ($suffersId != null) {
                $suffers = $this->suffersRepository->create(array($request->Id_Paciente, $suffersId));
                if (!$suffers[0]->ok) {
                    $enfermedades = $this->suffersRepository->all();
                    return view('pages.query.edit', array(
                        'responseError' => $suffers[0]->message,
                        'enfermedades' => $enfermedades
                    ));
                }
            }
        }

        return redirect('/queries')->with('success', 'Consulta Actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $this->repository->delete($request->id_consulta);
        return $data;
    }
}
