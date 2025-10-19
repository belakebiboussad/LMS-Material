<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserCotroller extends Controller
{
    public function index() {
        return view('users.index',['users'=>User::all()]);
    }
    public function edit(User $user)
    {
       return view('users.edit', ['user'=>$user]);
    }
    public function update(Request $request, User $user)
    {
    }
     public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'utilisateur supprimé avec succès');
    }
}
