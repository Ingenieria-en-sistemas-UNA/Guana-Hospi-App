<?php

namespace App\Http\Controllers;

use App\Especialidad;
use Illuminate\Http\Request;
use App\Repositories\SpecialtyRepository;
use Illuminate\Support\Facades\DB;

class SpecialtyController extends Controller
{
    /** @var SpecialtyRepository */
    private $repository;

    public function __construct(SpecialtyRepository $repository)
    {
        $this->middleware('auth');
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
            $request->NombreEspecialidad
        );

        $data = $this->repository->create($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidad  $Especialidad
     * @return \Illuminate\Http\Paciente
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidad $especialidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->id_especialidad,
            $request->nombreEspecialidad
        );

        $data = $this->repository->update($fields);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidad  $Especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $this->repository->delete($request->id_especialidad);
        return $data;
    }
}
