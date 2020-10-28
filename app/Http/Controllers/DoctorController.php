<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\DoctorRepository;
use App\Repositories\PeopleRepository;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    /** @var DoctorRepository */
    private $doctorRepository;

    /** @var PeopleRepository */
    private $peopleRepository;

    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

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

        $rules = array(
            'Nombre_Persona' => 'required|max:40|min:3',
            'Primer_Apellido' => 'required|max:50|min:3',
            'Segundo_Apellido' => 'required|max:50|min:3',
            'Edad' => 'required|numeric|max:99|min:15',
            'Cedula_Persona' => 'required|max:12|min:1',
            'Codigo_Medico' => 'required|numeric',
            'email' => 'required|string|email|max:255:unique:users',
            'password' => 'required|string|min:8|confirmed'
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
            return view('pages.doctor.create', array('responseError' => $response[0]->message));
        }

        $doctor = array(
            $request->Codigo_Medico,
            $request->Cedula_Persona
        );

        $response = $this->doctorRepository->create($doctor);
        if (!$response[0]->ok) {
            $this->peopleRepository->delete($request->Cedula_Persona);
            return view('pages.doctor.create', array('responseError' => $response[0]->message));
        }

        User::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'id_medico' => $response[0]->beforeId + 1
        ]);

        return redirect('/doctors')->with('success', 'Medico creado!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->doctorRepository->find($id);
        if (!$response[0]->ok) {
            return redirect('/doctors')->with('error', 'Error: ' . $response[0]->message);
        }
        return view('pages.doctor.edit', array('medico' => $response[0], 'responseError' => false));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
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
            'Codigo_Medico' => 'required|numeric'
        );

        $this->validate($request, $rules, $this->customMessages);

        $person = array(
            $request->Cedula_Persona,
            $request->Nombre_Persona,
            $request->Primer_Apellido,
            $request->Segundo_Apellido,
            $request->Edad,
        );
        $response = $this->peopleRepository->update($person);
        if (!$response[0]->ok) {
            $responseMedico = $this->doctorRepository->find($id);
            if (!$responseMedico[0]->ok) {
                return redirect('/doctors')->with('error', 'Error: ' . $responseMedico[0]->message);
            }
            return view('pages.doctor.edit', array('responseError' => $response[0]->message, 'medico' => $responseMedico[0]));
        }
        return redirect('/doctors')->with('success', 'Se ha actualizado un Medico!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->doctorRepository->delete($id);
        if (!$response[0]->ok) {
            return redirect('/doctors')->with('error', 'Error: ' . $response[0]->message);
        }
        return redirect('/doctors')->with('success', 'Se ha eliminado un Medico!');
    }
}
