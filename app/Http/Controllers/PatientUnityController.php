<?php

namespace App\Http\Controllers;

use App\Paciente_unidad;
use Illuminate\Http\Request;
use App\Repositories\PatientUnityRepository;
use Illuminate\Support\Facades\DB;

class PatientUnityController extends Controller
{
    /** @var PatientUnityRepository */
    private $repository;

    public function __construct(PatientUnityRepository $repository)
    {
        $this->repository = $repository;
    }

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->all();
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $request->IdPaciente,
            $request->IdUnidad
        );

        $data = $this->repository->create($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente_unidad  $paciente_unidad
     * @return \Illuminate\Http\Paciente
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente_unidad  $paciente_unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente_unidad $paciente_unidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente_unidad  $paciente_unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->id_paciente_unidad,
            $request->id_paciente,
            $request->id_unidad
        );

        $data = $this->repository->update($fields);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente_unidad  $Paciente_unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $this->repository->delete($request->id_paciente_unidad);
        return $data;
    }
}
