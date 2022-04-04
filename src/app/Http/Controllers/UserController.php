<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;   

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('manage', User::class);
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $this->authorize('manage', User::class);
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('manage', User::class);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->role = $request->role;
        if($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('usuarios.index');
    }
}
