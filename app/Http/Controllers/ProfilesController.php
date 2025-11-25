<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
class ProfilesController extends Controller
{
    public function show($username)
    {
        dd($username);
        try {
            $user = $this->getUserByUsername($username);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $currentTheme = Theme::find($user->profile->theme_id);

        $data = [
            'user'         => $user,
            'currentTheme' => $currentTheme,
        ];

        return view('profiles.show')->with($data);
    }
    public function getUserByUsername($username)
    {
        return User::with('profile')->wherename($username)->firstOrFail();
    }
}
