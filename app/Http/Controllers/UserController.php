<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('admin.user.index')->only('index');
        $this->middleware('admin.user.update')->only('edit','update');
    }*/
    public function index()
    {
        return view('users');
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.usercreate', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required',
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $user->roles()->sync($request->roles);
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
        return redirect()->route('users.index')->with('info', 'El usuario:' .$request->name.'se a creado con exito');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function edit( User $user)
    {
        $roles = Role :: all();
        return view('users.edit', compact('user','roles')); 
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index')->with('info', 'Se asignó los roles correctamente');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('info', 'El usuario se elimino con exito');
        
    }
}
