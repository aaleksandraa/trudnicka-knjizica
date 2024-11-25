<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    if (auth()->check()) {
        if (auth()->user()->SuperAdmin) {
            $users = User::all();
            return view('index', compact('users'));
        }
    }

    return redirect()->route('login');
}


    public function profile($id)
    {
    $user = User::find($id);
    
    // Provjera da li je korisnik prijavljen i da li je trenutni korisnik superadmin
    if (auth()->check() && auth()->user()->SuperAdmin) {
        // Superadmin ima pristup svim profilima
        return view('profile', compact('user'));
    } elseif (auth()->check() && auth()->user()->id == $id) {
        // Obični korisnik može pristupiti samo svom profilu
        return view('profile', compact('user'));
    } else {
        // Pristup odbijen za ostale korisnike
        return redirect()->back()->with('error', 'Access Denied');
    }
    }   





    
}
