<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Repositories\PatientRepository;
use App\Repositories\PeopleRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ActivitiesRepository;
use App\Repositories\QueryRepository;
use App\Repositories\DiseaseRepository;
use App\Repositories\InterventionRepository;

class PatientController extends Controller
{
    /** @var QueryRepository */
    private $queryRepository;

    /** @var PatientRepository */
    private $patientRepository;

    /** @var DiseaseRepository */
    private $diseaseRepository;

    /** @var PeopleRepository */
    private $peopleRepository;

    /** @var InterventionRepository */
    private $interventionRepository;


    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(
        QueryRepository $queryRepository,
        PeopleRepository $peopleRepository,
        PatientRepository $patientRepository,
        DiseaseRepository $diseaseRepository,
        InterventionRepository $interventionRepository
    ) {
        $this->middleware('auth');
        $this->queryRepository = $queryRepository;
        $this->peopleRepository = $peopleRepository;
        $this->patientRepository = $patientRepository;
        $this->diseaseRepository = $diseaseRepository;
        $this->interventionRepository = $interventionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = $this->patientRepository->all();
        return view('pages.patient.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.patient.create', array('responseError' => false));
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
            'Nombre_Persona' => 'required|max:40|min:3',
            'Primer_Apellido' => 'required|max:50|min:3',
            'Segundo_Apellido' => 'required|max:50|min:3',
            'Edad' => 'required|numeric|max:99|min:15',
            'Cedula_Persona' => 'required|max:12|min:1',
            'Numero_seguro_social' => 'required|numeric|max:50000|min:1',
            'Fecha_Ingreso' => 'required|date'
        );

        $this->validate($request, $rules, $this->customMessages);

        $person = array(
            $request->Cedula_Persona,
            $request->Nombre_Persona,
            $request->Primer_Apellido,
            $request->Segundo_Apellido,
            $request->Edad,
        );

        $response = $this->peopleRepository->create($person);
        if (!$response[0]->ok) {
            return view('pages.patient.create', array('responseError' => $response[0]->message));
        }

        $patient = array(
            $request->Numero_seguro_social,
            $request->Fecha_Ingreso,
            $request->Cedula_Persona,
            Auth::user()->id
        );


        $response = $this->patientRepository->create($patient);
        if (!$response[0]->ok) {
            $this->peopleRepository->delete($request->Cedula_Persona);
            return view('pages.patient.create', array('responseError' => $response[0]->message));
        }

        return redirect('/patients')->with('success', 'Paciente Creado!');
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Paciente
     */
    public function show($id)
    {
        $patient = $this->patientRepository->find($id)[0];
        if(!$patient->ok){
            return Response::json(['status' => 400]);
        }
        $querys = $this->queryRepository->findByPatientId($id);
        $diseases = [];
        $intervenciones = [];
        foreach ($querys as $query) {
            $diseases = array_merge($diseases, $this->diseaseRepository->findDisPacientIdAndQueryId($id, $query->Id_Consulta));
            $intervenciones = array_merge($intervenciones, $this->interventionRepository->findInterventionByQueryId($query->Id_Consulta));
        }

        $view = view('pages.patient.show', array(
            'patient' => $patient,
            'diseases' => $diseases,
            'intervenciones' => $intervenciones,
            'querys' => $querys
        ))->render();

        return Response::json(['status' => 200, 'view' => $view]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->patientRepository->find($id);

        if (!$response[0]->ok) {
            return redirect('/patients')->with('error', 'Error: ' . $response[0]->message);
        }
        return view('pages.patient.edit', array('patient' => $response[0], 'responseError' => false));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'Nombre_Persona' => 'required|max:40|min:3',
            'Primer_Apellido' => 'required|max:50|min:3',
            'Segundo_Apellido' => 'required|max:50|min:3',
            'Edad' => 'required|numeric|max:99|min:15',
            'Cedula_Persona' => 'required|max:12|min:1',
            'Numero_seguro_social' => 'required|numeric|max:50000|min:1',
            'Fecha_Ingreso' => 'required|date'
        );

        $this->validate($request, $rules, $this->customMessages);

        $person = array(
            $request->Cedula_Persona,
            $request->Nombre_Persona,
            $request->Primer_Apellido,
            $request->Segundo_Apellido,
            $request->Edad,
            Auth::user()->id
        );
        $response = $this->peopleRepository->update($person);
        if (!$response[0]->ok) {
            $responsePaciente = $this->patientRepository->find($id);
            if (!$responsePaciente[0]->ok) {
                return redirect('/patients')->with('error', 'Error: ' . $responsePaciente[0]->message);
            }
            return view('pages.patient.edit', array('responseError' => $response[0]->message, 'Paciente' => $responsePaciente[0]));
        }

        $activity = array(
            Auth::user()->id,
            'Ha Actualizado Los Datos Del Paciente!'
        );

        $this->activitiesRepository->create($activity);

        return redirect('/patients')->with('success', 'Se ha actualizado un Paciente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->patientRepository->delete($id);
        if (!$response[0]->ok) {
            return redirect('/patients')->with('error', 'Error: ' . $response[0]->message);
        }
        return redirect('/patients')->with('success', 'Se ha eliminado un Paciente!');
    }
}
