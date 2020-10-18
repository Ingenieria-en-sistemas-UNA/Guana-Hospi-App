<?php

namespace App\Http\Controllers;

use App\Sintoma;
use Illuminate\Http\Request;
use App\Repositories\SymptonRepository;
use Illuminate\Support\Facades\DB;

class SymptonController extends Controller
{
    /** @var SymptonRepository */
    private $repository;

    public function __construct(SymptonRepository $repository)
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
            $request->Nombre
        );

        $data = $this->repository->create($fields);
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Sintoma  $sintoma
     * @return \Illuminate\Http\Paciente
     */
    public function show(Sintoma $Sintoma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sintoma  $sintoma
     * @return \Illuminate\Http\Response
     */
    public function edit(Sintoma $Sintoma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sintoma  $sintoma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = array(
            $request->id_sintoma,
            $request->nombre
        );

        $data = $this->repository->update($fields);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sintoma  $sintoma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $this->repository->delete($request->id_sintoma);
        return $data;
    }
}