<?php

namespace App\Http\Controllers;

use App\Medico_especialidad;
use Illuminate\Http\Request;
use App\Repositories\SpecialtyDoctorRepository;
use Illuminate\Support\Facades\DB;

class SpecialtyDoctorController extends Controller
{
    /** @var SpecialtyDoctorRepository */
    private $repository;

    public function __construct(SpecialtyDoctorRepository $repository)
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
            $request->IdMedico,
            $request->IdEspecialidad
        );

        $data = $this->repository->create($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Medico_Especialidad  $medico_Especialidad
     * @return \Illuminate\Http\Paciente
     */
    public function show(Medico_Especialidad $medico_Especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico_Especialidad  $medico_Especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico_Especialidad $medico_Especialidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico_Especialidad  $medico_Especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->id_medico_especialidad,
            $request->id_medico,
            $request->id_especialidad
        );

        $data = $this->repository->update($fields);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico_Especialidad  $medico_Especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $this->repository->delete($request->id_medico_especialidad);
        return $data;
    }
}
