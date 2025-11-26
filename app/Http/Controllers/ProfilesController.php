<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class ProfilesController extends Controller
{
    public function show($username)
    {
        try {
            $user = $this->getUserByUsername($username);
            return view('profile.show',compact('user'));
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
       
    }
    public function getUserByUsername($username)
    {
          return User::wherename($username)->firstOrFail();
    }
}
