<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Commune;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Farm;

class UserCotroller extends Controller
{
    use AuthorizesRequests; // Use the trait here
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }
    public function create()
    {
        $roles = Role::all();
        $cities = Commune::all();
        return view('users.create', compact('roles', 'cities'));
    }
    public function edit(User $user)
    {
        $this->authorize('users.update');
        $roles = Role::all();
        $cities = Commune::all();
        return view('users.edit', compact('roles', 'cities'))->with('user', $user);
    }
    public function show(User $user) {}
    public function store(UserRequest $request,User $model)
    {
        if ($request->input('role') === 'admin') {

            $adminUsers = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();
            if ($adminUsers->isNotEmpty()) {
                return back()->withInput()->withErrors(['errors' => __('user.admin')]);
            }
        }
        $model->create($request->merge(['password' => bcrypt($request->get('password'))])->all());
        $model->assignRole($ $request->input('role'));
        return redirect()->route('user.index')->withStatus(__('user.updated'));
    }
    public function update(UpdateUserRequest  $request, User $user)
    {
        if ($request->input('role') === 'admin') {
            $adminUsers = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();

            if (! $adminUsers->contains($user) || ($adminUsers->count() > 1))
                return back()->withErrors(['errors' => __('user.admin')]);
        }
        $user->update($request->all());
        $user->assignRole($request->input('role'));
        // 'utilisateur mis à jour avec succès'
        return redirect()->route('users.index')->with('success',  __('user.updated'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success',  __('user.deleted'));
    }
}
