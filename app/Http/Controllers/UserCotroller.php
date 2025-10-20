<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserCotroller extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }
    public function create()
    {
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }
    public function show(User $user) {}
    public function update(Request $request, User $user)
    {
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'about' => 'nullable|string',
        ]));
        return redirect()->route('users.index')->with('success', 'utilisateur mis à jour avec succès');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'utilisateur supprimé avec succès');
    }
}
