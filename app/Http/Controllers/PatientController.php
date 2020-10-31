<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PatientRepository;
use App\Repositories\PeopleRepository;

class PatientController extends Controller
{
    /** @var PatientRepository */
    private $patientrepository;


    /** @var PeopleRepository */
    private $peopleRepository;

    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(PatientRepository $patientrepository, PeopleRepository $peopleRepository )
    {
        $this->middleware('auth');
        $this->patientrepository = $patientrepository;
        $this->peopleRepository = $peopleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = $this->patientrepository->all();
        return view('pages.patient.index', ['patients' => $patients]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.patient.create', array('responseError' => false));
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
            'Numero_seguro_social' => 'required|numeric|max:12|min:1',
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
            $request->Cedula_Persona
        );


        $response = $this->patientrepository->create($patient);
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
    public function show($paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->Numero_seguro_social,
            $request->FechaIngreso,
            $request->DniPersona
        );

        $data = $this->repository->update($fields);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->patientrepository->delete($id);
        if (!$response[0]->ok) {
            return redirect('/patients')->with('error', 'Error: ' . $response[0]->message);
        }
        return redirect('/patients')->with('success', 'Se ha eliminado un Medico!');
    }
}
