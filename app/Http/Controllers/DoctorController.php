<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\DoctorRepository;
use App\Repositories\PeopleRepository;
use App\Repositories\RolesRepository;
use App\Repositories\SpecialtyRepository;
use App\Repositories\SpecialtyDoctorRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    /** @var DoctorRepository */
    private $doctorRepository;

    /** @var PeopleRepository */
    private $peopleRepository;

    /** @var RolesRepository */
    private $rolesRepository;

    /** @var SpecialtyRepository */
    private $specialityRepository;

    /** @var SpecialtyDoctorRepository */
    private $specialtyDoctorRepository;

    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(
        DoctorRepository $doctorRepository,
        PeopleRepository $peopleRepository,
        RolesRepository $rolesRepository,
        SpecialtyRepository $specialityRepository,
        SpecialtyDoctorRepository $specialtyDoctorRepository
    ) {
        $this->middleware(['auth', 'check_role:Administrador']);
        $this->doctorRepository = $doctorRepository;
        $this->peopleRepository = $peopleRepository;
        $this->rolesRepository = $rolesRepository;
        $this->specialityRepository = $specialityRepository;
        $this->specialtyDoctorRepository = $specialtyDoctorRepository;
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
        $specialities = $this->specialityRepository->all();
        return view('pages.doctor.create', array('responseError' => false, 'specialities' => $specialities));
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
            $specialities = $this->specialityRepository->all();
            return view('pages.doctor.create', array('responseError' => $response[0]->message, 'specialities' => $specialities));
        }


        $doctor = array(
            $request->Codigo_Medico,
            $request->Cedula_Persona,
            Auth::user()->id
        );

        $response = $this->doctorRepository->create($doctor);
        if (!$response[0]->ok) {
            $specialities = $this->specialityRepository->all();
            $this->peopleRepository->delete($request->Cedula_Persona);
            return view('pages.doctor.create', array('responseError' => $response[0]->message, 'specialities' => $specialities));
        }

        $responseRole = $this->rolesRepository->findByName('Medico');
        if (!$responseRole[0]->ok) {
            $this->rolesRepository->create(['Medico']);
            $responseRole = $this->rolesRepository->findByName('Medico');
        }
        $medicoId = $response[0]->currentId == 1 ? 1 : $response[0]->currentId;;
        $specialitiesSelected = $request->specialities;

        if (count($specialitiesSelected) > 0) {
            foreach ($specialitiesSelected as $specialityId) {
                if ($specialityId != null) {
                    $responseMedicoEspecialidad = $this->specialtyDoctorRepository->create(array($medicoId, $specialityId));
                    if (!$responseMedicoEspecialidad[0]->ok) {
                        $specialities = $this->specialityRepository->all();
                        return view('pages.doctor.create', array(
                            'responseError' => $responseMedicoEspecialidad[0]->message,
                            'specialities' => $specialities
                        ));
                    }
                }
            }
        }

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_medico' => $medicoId,
            'id_role' => $responseRole[0]->Id_Role
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
        $specialitiesMedico = $this->specialityRepository->findByDoctorId($id);
        $specialities = $this->specialityRepository->all();
        return view('pages.doctor.edit', array(
            'medico' => $response[0],
            'responseError' => false,
            'specialities' => $specialities,
            'specialitiesMedico' => $specialitiesMedico
        ));
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
            $specialitiesMedico = $this->specialityRepository->findByDoctorId($id);
            $specialities = $this->specialityRepository->all();
            return view(
                'pages.doctor.edit',
                array(
                    'responseError' => $response[0]->message,
                    'medico' => $responseMedico[0],
                    'specialities' => $specialities,
                    'specialitiesMedico' => $specialitiesMedico
                )
            );
        }

        $this->specialtyDoctorRepository->delete($id);

        $specialitiesSelected = $request->specialities;
        if (count($specialitiesSelected) > 0) {
            foreach ($specialitiesSelected as $specialityId) {
                if ($specialityId != null) {
                    $responseMedicoEspecialidad = $this->specialtyDoctorRepository->create(array($id, $specialityId));
                    if (!$responseMedicoEspecialidad[0]->ok) {
                        $responseMedico = $this->doctorRepository->find($id);
                        if (!$responseMedico[0]->ok) {
                            return redirect('/doctors')->with('error', 'Error: ' . $responseMedico[0]->message);
                        }
                        $specialitiesMedico = $this->specialityRepository->findByDoctorId($id);
                        $specialities = $this->specialityRepository->all();
                        return view('pages.doctor.edit', array(
                            'responseError' => $responseMedicoEspecialidad[0]->message,
                            'medico' => $responseMedico[0],
                            'specialities' => $specialities,
                            'specialitiesMedico' => $specialitiesMedico
                        ));
                    }
                }
            }
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
