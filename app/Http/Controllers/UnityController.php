<?php

namespace App\Http\Controllers;

use App\Unidad;
use Illuminate\Http\Request;
use App\Repositories\UnityRepository;
use App\Repositories\DoctorRepository;
use Illuminate\Support\Facades\DB;

class UnityController extends Controller
{
    /** @var UnityRepository */
    private $unityRepository;

    /** @var DoctorRepository */
    private $doctorRepository;

    public function __construct(UnityRepository $unityRepository, DoctorRepository $doctorRepository)
    {
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
        $fields = array(
            $request->Nombre,
            $request->Numero_planta
        );

        $data = $this->unityRepository->create($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Paciente
     */
    public function show(Unidad $unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidad $unidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->id_unidad,
            $request->nombre,
            $request->numeroPlanta
        );

        $data = $this->unityRepository->update($fields);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $this->unityRepository->delete($request->id_unidad);
        return $data;
    }
}
