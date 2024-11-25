<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Handle the registration form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'marital_status' => 'required|in:Slobodna,U braku,Razvedena,Udovica',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'height' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'personal_history' => 'nullable|array',
            'family_history' => 'nullable|array',
            'menstrual_cycle_duration' => 'nullable|string|max:255',
            'menstrual_cycle_length' => 'nullable|string|max:255',
            'note' => 'nullable|string',
        ]);

        // Create a new user
        $user = new User();
        $user->ime = $request->name;
        $user->datum_rodjenja = $request->dob;
        $user->adresa = $request->address;
        $user->zanimanje = $request->occupation;
        $user->brak = $request->marital_status;
        $user->telefon = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->visina = $request->height;
        $user->tezina = $request->weight;
        $user->SuperAdmin = false; // Not a SuperAdmin

        // Save additional fields
         // Save additional fields
         $user->personal_history = serialize($request->input('personal_history', []));
         $user->family_history = serialize($request->input('family_history', []));
        $user->menstrual_cycle_duration = $request->input('menstrual_cycle_duration');
        $user->menstrual_cycle_length = $request->input('menstrual_cycle_length');
        $user->note = $request->input('note');

        $user->save();

        return redirect()->route('profile', ['id' => $user->id])
        ->with('success', 'Nova trudnica je uspješno dodana!');    
    }

    
}
