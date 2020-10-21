<?php

namespace App\Http\Controllers;

use App\Presenta;
use Illuminate\Http\Request;
use App\Repositories\PresentsRepository;
use Illuminate\Support\Facades\DB;

class PresentsController extends Controller
{
    /** @var PresentsRepository */
    private $repository;

    public function __construct(PresentsRepository $repository)
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
            $request->IdConsulta,
            $request->IdSintoma,
            $request->Descripcion
        );

        $data = $this->repository->create($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Presenta  $presenta
     * @return \Illuminate\Http\Paciente
     */
    public function show(Presenta $presenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presenta  $presenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Presenta $presenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presenta  $presenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->id_resenta,
            $request->id_consulta,
            $request->id_sintoma,
            $request->descripcion_presenta
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
        $data = $this->repository->delete($request->id_presenta);
        return $data;
    }
}
