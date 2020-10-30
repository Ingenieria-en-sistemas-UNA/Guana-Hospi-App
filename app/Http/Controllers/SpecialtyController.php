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

    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(SpecialtyRepository $repository)
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
        $specialities = $this->repository->all();
        return view('pages.speciality.index', compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.speciality.create', array('responseError' => false));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'Nombre_Especialidad' => 'required|max:255|min:3'
        );

        $this->validate($request, $rules, $this->customMessages);

        $speciality = array(
            $request->Nombre_Especialidad
        );

        $response = $this->repository->create($speciality);

        if (!$response[0]->ok) {
            return view('pages.speciality.create', array('responseError' => $response[0]->message));
        }
        return redirect('/specialities')->with('success', 'Se ha creado una Especialidad!');
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Paciente
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->repository->find($id);

        if (!$response[0]->ok) {
            return redirect('/specialities')->with('error', 'Error: ' . $response[0]->message);
        }
        return view('pages.speciality.edit', array('speciality' => $response[0], 'responseError' => false));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'Nombre_Especialidad' => 'required|max:255|min:3'
        );

        $this->validate($request, $rules, $this->customMessages);

        $speciality = array(
            $id,
            $request->Nombre_Especialidad
        );

        $response = $this->repository->update($speciality);
        if (!$response[0]->ok) {
            $responseEspecialidad = $this->repository->find($id);
            if (!$responseEspecialidad[0]->ok) {
                return redirect('/specialities')->with('error', 'Error: ' . $responseEspecialidad[0]->message);
            }
            return view('pages.speciality.edit', array('responseError' => $response[0]->message, 'disease' => $responseEspecialidad[0]));
        }
        return redirect('/specialities')->with('success', 'Se ha actualizado una Especialidad!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidad  $Especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->repository->delete($id);
        if (!$response[0]->ok) {
            return redirect('/specialities')->with('error', 'Error: ' . $response[0]->message);
        }
        return redirect('/specialities')->with('success', 'Se ha eliminado una Especialidad!');
    }
}
