<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('SuperAdmin', 0)->get();

        return view('index', compact('users'));
    }

    public function profile($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404); // Or handle the case when the user doesn't exist
        }

        return view('profile', compact('user'));
    }
    
}
