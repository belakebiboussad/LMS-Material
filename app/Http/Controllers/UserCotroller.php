<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UpdateUserRequest;

class UserCotroller extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }
    public function create()
    {
        $roles = Role::all();
        $cities = City::all();
        return view('users.create', compact('roles', 'cities'));
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        $cities = City::all();
        return view('users.edit', compact('roles', 'cities'))->with('user', $user);
    }
    public function show(User $user) {}
    public function store(Request $request)
    {
        $request->validate([
            'prof_id' => 'required|string|size:15|unique:users,prof_id',
            'NIN' => 'required|string|size:20|unique:users,NIN',
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'commune_id' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
        if ($request->input('role') === 'admin') {

            $adminUsers = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();
            if ($adminUsers->isNotEmpty()) {
                return back()->withInput()->withErrors(['errors' => __('admin')]);
            }
        }
        $user = User::create($request->all());
        $role = $request->input('role');
        $user->assignRole($role);
        return redirect()->route('users.index')->with('success', 'utilisateur créé avec succès');
    }
    public function update(UpdateUserRequest  $request, User $user)
    {
        if ($request->input('role') === 'admin') {
            $adminUsers = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();

            if (! $adminUsers->contains($user) || ($adminUsers->count() > 1))
                return back()->withErrors(['status' => 'Only one admin user is allowed.']);
        }
        $user->update($request->all());
        $user->assignRole($request->input('role'));
        return redirect()->route('users.index')->with('success', 'utilisateur mis à jour avec succès');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success',  __('user.deleated'));
    }
}
