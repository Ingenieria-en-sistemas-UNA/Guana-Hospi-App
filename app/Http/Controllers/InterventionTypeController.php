<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InterventionTypeRepository;
use Illuminate\Support\Facades\Auth;

class InterventionTypeController extends Controller
{
    /** @var InterventionTypeRepository */
    private $interventiontypeRepository;


    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );


    public function __construct(InterventionTypeRepository $interventiontypeRepository)
    {
        $this->middleware('auth');
        $this->interventiontypeRepository = $interventiontypeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interventiontypes = $this->interventiontypeRepository->all();
        return view('pages.interventiontype.index', ['interventiontypes' => $interventiontypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.interventiontype.create', array('responseError' => false));
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
            'Nombre_Intervencion' => 'required|max:255|min:3'
        );

        $this->validate($request, $rules, $this->customMessages);

        $interventiontypes = array(
            $request->Nombre_Intervencion,
            Auth::user()->id
        );

        $response = $this->interventiontypeRepository->create($interventiontypes);

        if (!$response[0]->ok) {
            return view('pages.interventiontype.create', array('responseError' => $response[0]->message));
        }
        return redirect('/interventionTypes')->with('success', 'Se ha creado un tipo de intervención!');
    }
    
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($tipoIntervencion)
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
       $response = $this->interventiontypeRepository->find($id);

        if (!$response[0]->ok) {
            return redirect('/interventionTypes')->with('error', 'Error: ' . $response[0]->message);
        }
        return view('pages.interventiontype.edit', array('interventiontypes' => $response[0], 'responseError' => false));
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
            'Nombre_Intervencion' => 'required|max:255|min:3'
        );

        $this->validate($request, $rules, $this->customMessages);

        $interventiontypes = array(
            $id,
            $request->Nombre_Intervencion
        );

        $response = $this->interventiontypeRepository->update($interventiontypes);
        if (!$response[0]->ok) {
            $responseTipoIntervencion = $this->interventiontypeRepository->find($id);
            if (!$responseTipoIntervencion[0]->ok) {
                return redirect('/interventionTypes')->with('error', 'Error: ' . $responseTipoIntervencion[0]->message);
            }
            return view('pages.interventiontype.edit', array('responseError' => $response[0]->message, 'disease' => $responseTipoIntervencion[0]));
        }
        return redirect('/interventionTypes')->with('success', 'Se ha actualizado un tipo de intervención!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoIntervencion  $tipoIntervencion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->interventiontypeRepository->delete($id);
        if (!$response[0]->ok) {
            return redirect('/interventionTypes')->with('error', 'Error: ' . $response[0]->message);
        }
        return redirect('/interventionTypes')->with('success', 'Se ha eliminado una un tipo de intervencion!!');
    }
}

