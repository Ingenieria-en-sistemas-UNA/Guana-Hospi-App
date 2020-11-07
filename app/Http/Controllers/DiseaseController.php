<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DiseaseRepository;
use Illuminate\Support\Facades\Auth;

class DiseaseController extends Controller
{
    /** @var DiseaseRepository */
    private $repository;

    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(DiseaseRepository $repository)
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
        $diseases = $this->repository->all();
        return view('pages.disease.index', array('diseases' => $diseases));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.disease.create', array('responseError' => false));
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
            'Nombre_Enfermedad' => 'required|max:255|min:3'
        );

        $this->validate($request, $rules, $this->customMessages);

        $disease = array(
            $request->Nombre_Enfermedad,
            Auth::user()->id
        );

        $response = $this->repository->create($disease);

        if (!$response[0]->ok) {
            return view('pages.disease.create', array('responseError' => $response[0]->message));
        }
        return redirect('/diseases')->with('success', 'Se ha creado una Enfermedad!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function show($enfermedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->repository->find($id);
        if (!$response[0]->ok) {
            return redirect('/diseases')->with('error', 'Error: ' . $response[0]->message);
        }
        return view('pages.disease.edit', array('disease' => $response[0], 'responseError' => false));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'Nombre_Enfermedad' => 'required|max:255|min:3'
        );

        $this->validate($request, $rules, $this->customMessages);

        $disease = array(
            $id,
            $request->Nombre_Enfermedad,
            Auth::user()->id
        );

        $response = $this->repository->update($disease);
        if (!$response[0]->ok) {
            $responseEnfermedad = $this->repository->find($id);
            if (!$responseEnfermedad[0]->ok) {
                return redirect('/diseases')->with('error', 'Error: ' . $responseEnfermedad[0]->message);
            }
            return view('pages.disease.edit', array('responseError' => $response[0]->message, 'disease' => $responseEnfermedad[0]));
        }
        return redirect('/diseases')->with('success', 'Se ha actualizado una Enfermedad!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->repository->delete($id);
        if (!$response[0]->ok) {
            return redirect('/diseases')->with('error', 'Error: ' . $response[0]->message);
        }
        return redirect('/diseases')->with('success', 'Se ha eliminado una Enfermedad!');
    }
}

