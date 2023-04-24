<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Input\Input;


class UsuarioController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario', ['only'=>['index']]);
        $this->middleware('permission:crear-usuario', ['only'=>['create','store']]);
        $this->middleware('permission:editar-usuario', ['only'=>['edit','update']]);
        $this->middleware('permission:crear-usuario', ['only'=>['destroy']]);
    }

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|email',
            'password'=>'required|same:confirm-password',
            'roles'=>'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('usuarios.edit', compact('user', 'roles', 'userRole')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|email',
            'password'=>'same:confirm-password',
            'roles'=>'required'
        ]);
        $input = $request->all();

        //Si llega vacio el password lo omite para no modificarlo
        if(!empty($input['password']))
        {
            $input['password'] = Hash::make($input['password']);
        }
        else
        {
            $input['password'] = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update();
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignrole($request->input('roles'));
        return redirect()->route('usuarios.index');


        // $input['password'] = Hash::make($input['password']);
        // $user = User::create($input);
        // $user->assignRole($request->input('roles'));
        // return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}
