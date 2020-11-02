<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QueryRepository;
use App\Repositories\UnityRepository;
use App\Repositories\PatientRepository;
use Illuminate\Support\Facades\Hash;

class QueryController extends Controller
{
    /** @var QueryRepository */
    private $repository;

    /** @var UnityRepository */
    private $unityRepository;

    /** @var PatientRepository */
    private $patientRepository;

    /** @var PeopleRepository */
    private $peopleRepository;

    public function __construct(QueryRepository $queryRepository, UnityRepository $unityRepository, PatientRepository $patientRepository)
    {
        $this->middleware('auth');
        $this->queryRepository = $queryRepository;
        $this->unityRepository = $unityRepository;
        $this->patientRepository = $patientRepository;
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
        return view('pages.query.create', array('responseError' => false, 'units' => $units, 'patients' => $patients));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = array(
            $request->Id_Paciente,
            $request->Id_Unidad ?? null
        );

        $response = $this->queryRepository->create($fields);

        if (!$response[0]->ok) {
            return view('pages.query.create', array('responseError' => $response[0]->message));
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
    public function edit($consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->id_consulta,
            $request->id_paciente
        );

        $data = $this->repository->update($fields);
        return $data;
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
