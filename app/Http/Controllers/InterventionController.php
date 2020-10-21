<?php

namespace App\Http\Controllers;

use App\Intervenciones;
use Illuminate\Http\Request;
use App\Repositories\InterventionRepository;
use Illuminate\Support\Facades\DB;

class InterventionController extends Controller
{
    /** @var InterventionRepository */
    private $repository;

    public function __construct(InterventionRepository $repository)
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
            $request->Tratamiendo,
            $request->IdTipoIntervencion,
            $request->IdConsulta
        );

        $data = $this->repository->create($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Unidad_medico  $unidad_medico
     * @return \Illuminate\Http\Response
     */
    public function show(Intervenciones $intervenciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Intervenciones  $intervenciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Intervenciones $intervenciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Intervenciones  $intervenciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->id_intervencion,
            $request->tratamiento,
            $request->id_tipo_intervencion,
            $request->id_consulta
        );

        $data = $this->repository->update($fields);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intervenciones  $intervenciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $this->repository->delete($request->id_intervencion);
        return $data;
    }
}
