<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('users');
    }
    public function edit( User $user)
    {
        $roles = Role :: all();
        return view('users.edit', compact('user','roles')); 
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit',$user)->with('info', 'Se asignó los roles correctamente');
    }
}
