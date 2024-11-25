<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->SuperAdmin) {
            // Filtriraj samo korisnike koji nisu admini (SuperAdmin = 0)
            $users = User::where('SuperAdmin', 0)->get();
            
            return view('index', compact('users'));
        } else {
            return view('index'); // Ako nije SuperAdmin, vraća praznu stranicu
        }
    }
    


    
    // Your other methods...
}
