<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repositories\RolesRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use App\Repositories\ActivitiesRepository;

class UsersController extends Controller
{
    /** @var RolesRepository */
    private $rolesRepository;

    private $customMessages = array(
        'required' => 'Campo obligatorio',
        'numeric' => 'Debe ingresar numeros',
        'max' => ':attribute muy largo',
    );

    public function __construct(RolesRepository $rolesRepository, UserRepository $userRepository, ActivitiesRepository $activitiesRepository)
    {
        $this->middleware(['auth', 'check_role:Administrador']);
        $this->rolesRepository = $rolesRepository;
        $this->userRepository = $userRepository;
        $this->activitiesRepository = $activitiesRepository;
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

        $User = array(
            $request->email,
            Hash::make($request->password),
            $responseRole[0]->Id_Role,
            null,
            Auth::user()->id
        );



        $response = $this->userRepository->create($User);
        if (!$response[0]->ok) {
            return view('pages.users.create', array('responseError' => $response[0]->message));
        }


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

        if ($request->password != '') {
            $response = $this->userRepository->update([$request->email,  Hash::make($request->password), Auth::user()->id]);
            if (!$response[0]->ok) {
                return view('pages.users.edit', array('responseError' => $response[0]->message));
            }
        } else {
            $response = $this->userRepository->updateOnlyEmail([$id, $request->email, Auth::user()->id]);
            if (!$response[0]->ok) {
                return view('pages.users.edit', array('responseError' => $response[0]->message));
            }
        }

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
        $response = $this->userRepository->delete($id);
        if (!$response[0]->ok) {
            return redirect('/users')->with('error', 'Error: ' . $response[0]->message);
        }
        return redirect('/users')->with('success', 'Se ha eliminado un Usuario!');
    }
}
