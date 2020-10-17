<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;
use App\Repositories\DoctorRepository;
use App\Repositories\PeopleRepository;

class DoctorController extends Controller
{

    /** @var DoctorRepository */
    private $doctorRepository;

    /** @var PeopleRepository */
    private $peopleRepository;

    public function __construct(DoctorRepository $doctorRepository, PeopleRepository $peopleRepository)
    {
        $this->middleware('auth');
        $this->doctorRepository = $doctorRepository;
        $this->peopleRepository = $peopleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = $this->doctorRepository->all();
        return view('pages.doctor.index', array('doctors' => $doctors));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.doctor.create', array('responseError' => false));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'nombre_persona' => 'required|max:40|min:3',
            'apellido_1' => 'required|max:50|min:4',
            'apellido_2' => 'required|max:50|min:4',
            'edad' => 'required|numeric|max:99|min:15',
            'dni_persona' => 'required|max:12|min:9',
            'codigo_medico' => 'required|numeric',
        ];

        $customMessages = [
            'required' => 'Campo obligatorio',
            'numeric' => 'Debe ingresar numeros',
            'max' => ':attribute muy largo',
        ];

        $this->validate($request, $rules, $customMessages);


        $person = array(
            $request->dni_persona,
            $request->nombre_persona,
            $request->apellido_1,
            $request->apellido_2,
            $request->edad,
        );

        $response = $this->peopleRepository->create($person);
        if(!$response[0]->ok){
            return view('pages.doctor.create', array('responseError' => $response[0]->message));
        }

        $doctor = array(
            $request->codigo_medico,
            $request->dni_persona
        );

        $response = $this->doctorRepository->create($doctor);
        if(!$response[0]->ok){
            $this->peopleRepository->delete($request->dni_persona);
            return view('pages.doctor.create', array('responseError' => $response[0]->message));
        }

        return redirect('/doctors')->with('success', 'Medico creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        //
    }
}
