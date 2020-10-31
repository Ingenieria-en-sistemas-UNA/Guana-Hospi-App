<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\RolesRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /** @var RolesRepository */
    private $rolesRepository;

    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(RolesRepository $rolesRepository)
    {
        $this->middleware(['auth', 'check_role:Administrador']);
        $this->rolesRepository = $rolesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
                        ->join('Roles', 'users.id_role', '=', 'Roles.id_role')
                        ->select('users.id', 'users.email', 'Roles.id_role', 'Roles.nombre_role')
                        ->get();
        return view('pages.users.index', array('users' => $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.create', array('responseError' => false));
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
            'email' => 'required|string|email|max:255:unique:users',
            'password' => 'required|string|min:8|confirmed'
        );

        $this->validate($request, $rules, $this->customMessages);

        $responseRole = $this->rolesRepository->findByName('Administrador');
        if (!$responseRole[0]->ok) {
            $this->rolesRepository->create(['Administrador']);
            $responseRole = $this->rolesRepository->findByName('Administrador');
        }

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_medico' => null,
            'id_role' =>$responseRole[0]->Id_Role
        ]);

        return redirect('/users')->with('success', 'Usuario adminitrativo creado!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.edit', array('user' => $user, 'responseError' => false));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'email' => 'required|string|email|max:255:unique:users',
            'password' => 'string|min:8|confirmed|nullable'
        );

        $this->validate($request, $rules, $this->customMessages);

        $user = User::find($id);
        $user->email = $request->email;
        if($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('/users')->with('success', 'Se ha actualizado un usuario!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/doctors')->with('success', 'Se ha eliminado un Medico!');
    }
}
