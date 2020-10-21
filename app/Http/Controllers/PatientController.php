<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;
use App\Repositories\PatientRepository;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /** @var PatientRepository */
    private $repository;

    public function __construct(PatientRepository $repository)
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
            $request->id_paciente,
            $request->numeroSeguroSocial,
            $request->fecha_ingreso,
            $request->dni_persona
        );

        $data = $this->repository->update($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Paciente
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
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
    public function destroy(Request $request)
    {
        $data = $this->repository->delete($request->id_paciente);
        return $data;
    }
}
