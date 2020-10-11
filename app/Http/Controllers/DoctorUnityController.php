<?php

namespace App\Http\Controllers;

use App\Unidad_medico;
use Illuminate\Http\Request;
use App\Repositories\DoctorUnityRepository;
use Illuminate\Support\Facades\DB;

class DoctorUnityController extends Controller
{
    /** @var DoctorUnityRepository */
    private $repository;

    public function __construct(DoctorUnityRepository $repository)
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
            $request->IdUnidad,
            $request->IdMedico
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
    public function show(Medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidad_medico  $unidad_medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidad_medico  $unidad_medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->IdUnidad,
            $request->IdMedico
        );

        $data = $this->repository->update($fields);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidad_medico  $unidad_medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $this->repository->delete($request->id_unidad_medico);
        return $data;
    }
}
