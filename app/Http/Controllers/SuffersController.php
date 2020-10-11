<?php

namespace App\Http\Controllers;

use App\Padece;
use Illuminate\Http\Request;
use App\Repositories\SuffersRepository;
use Illuminate\Support\Facades\DB;

class SuffersController extends Controller
{
    /** @var SuffersRepository */
    private $repository;

    public function __construct(SuffersRepository $repository)
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
            $request->IdEnfermedad
        );

        $data = $this->repository->create($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Padece  $padece
     * @return \Illuminate\Http\Paciente
     */
    public function show(Padece $padece)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Padece  $padece
     * @return \Illuminate\Http\Response
     */
    public function edit(Padece $padece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Padece  $padece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->IdPaciente,
            $request->IdEnfermedad
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
