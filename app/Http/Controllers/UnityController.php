<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UnityRepository;
use App\Repositories\DoctorRepository;

class UnityController extends Controller
{
    /** @var UnityRepository */
    private $unityRepository;

    /** @var DoctorRepository */
    private $doctorRepository;

    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(UnityRepository $unityRepository, DoctorRepository $doctorRepository)
    {
        $this->middleware(['auth', 'check_role:Administrador']);
        $this->unityRepository = $unityRepository;
        $this->doctorRepository = $doctorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = $this->unityRepository->all();
        return view('pages.units.index', array('units' => $units));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $doctors = $this->doctorRepository->all();
        return view('pages.units.create', array('responseError' => false, 'doctors' => $doctors));
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
            'Nombre_Unidad' => 'required|max:40|min:3|string',
            'Numero_Planta' => 'required|numeric|max:10',
        );

        $this->validate($request, $rules, $this->customMessages);

        $unity = array(
            $request->Nombre_Unidad,
            $request->Numero_Planta,
            $request->Id_Medico ?? null
        );


        $response = $this->unityRepository->create($unity);

        if (!$response[0]->ok) {
            return view('pages.units.create', array('responseError' => $response[0]->message));
        }

        return redirect('/units')->with('success', 'Unidad creada!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Paciente
     */
    public function show($unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->unityRepository->find($id);
        $doctors = $this->doctorRepository->all();
        if (!$response[0]->ok) {
            return redirect('/units')->with('error', 'Error: ' . $response[0]->message);
        }
        return view('pages.units.edit', array('unit' => $response[0], 'responseError' => false, 'doctors' => $doctors));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $rules = array(
            'Nombre_Unidad' => 'required|max:40|min:3|string',
            'Numero_Planta' => 'required|numeric|max:10',
        );

        $this->validate($request, $rules, $this->customMessages);

        $unity = array(
            $id,
            $request->Nombre_Unidad,
            $request->Numero_Planta,
            $request->Id_Medico ?? null
        );

        $response = $this->unityRepository->update($unity);

        if (!$response[0]->ok) {
            $responseUnidad = $this->unityRepository->find($id);
            if (!$responseUnidad[0]->ok) {
                return redirect('/units')->with('error', 'Error: ' . $responseUnidad[0]->message);
            }
            return view('pages.units.edit', array('responseError' => $response[0]->message, 'unit' => $responseUnidad[0]));
        }
        return redirect('/units')->with('success', 'Se ha actualizado una Unidad!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->unityRepository->delete($id);
        if (!$response[0]->ok) {
            return redirect('/units')->with('error', 'Error: ' . $response[0]->message);
        }
        return redirect('/units')->with('success', 'Se ha eliminado una Unidad!');
    }
}
