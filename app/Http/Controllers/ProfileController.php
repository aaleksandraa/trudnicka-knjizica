<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pregled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function showProfile($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'Korisnik nije pronađen.');
        }

        if (Auth::user()->SuperAdmin || $user->id === Auth::user()->id) {
            $personalHistory = unserialize($user->personal_history);
            $familyHistory = unserialize($user->family_history);
            $pregledi = Pregled::where('user_id', $id)->get();
            $sledeciPregled = Pregled::where('user_id', $id)
                ->where('datum_pregleda', '>', date('Y-m-d'))
                ->orderBy('datum_pregleda')
                ->first();

            return view('profile', compact('user', 'personalHistory', 'familyHistory', 'pregledi', 'sledeciPregled'));
        } else {
            return redirect()->route('profile', Auth::user()->id)->with('error', 'Nemate pristup traženom profilu.');
        }
    }
    


    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        $personalHistory = unserialize($user->personal_history);
        $familyHistory = unserialize($user->family_history);

        return view('profile.edit', compact('user', 'personalHistory', 'familyHistory'));
    }

    public function update(Request $request, $id)
{
    // Validacija ulaznih podataka
    $validatedData = $request->validate([
        'ime' => 'required',
        'datum_rodjenja' => 'required|date',
        'adresa' => 'required',
        'zanimanje' => 'required',
        'brak' => 'required',
        'telefon' => 'required',
        'email' => 'required|email',
        'visina' => 'required|numeric',
        'tezina' => 'required|numeric',
        'note' => 'required',
        'menstrual_cycle_duration' => 'required',
        'menstrual_cycle_length' => 'required',
        'personal_history' => 'required|array',
        'family_history' => 'required|array',
    ]);

    // Pronalaženje korisnika za ažuriranje
    $user = User::find($id);
    if (!$user) {
        // Korisnik nije pronađen, obradite ovu situaciju prema potrebi
    }

    // Ažuriranje korisnikovih podataka na temelju unesenih vrijednosti
    $user->ime = $validatedData['ime'];
    $user->datum_rodjenja = $validatedData['datum_rodjenja'];
    $user->adresa = $validatedData['adresa'];
    $user->zanimanje = $validatedData['zanimanje'];
    $user->brak = $validatedData['brak'];
    $user->telefon = $validatedData['telefon'];
    $user->email = $validatedData['email'];
    $user->visina = $validatedData['visina'];
    $user->tezina = $validatedData['tezina'];
    $user->note = $validatedData['note'];
    $user->menstrual_cycle_duration = $validatedData['menstrual_cycle_duration'];
    $user->menstrual_cycle_length = $validatedData['menstrual_cycle_length'];
    $user->personal_history = serialize($validatedData['personal_history']);
    $user->family_history = serialize($validatedData['family_history']);

    // Spremanje ažuriranih podataka
    $user->save();

    // Redirekcija na profil korisnika ili odgovarajuću stranicu
    return redirect()->route('profile', ['id' => $user->id]);  
    
}

public function editPregled($id, $pregledId)
{
    // Pristupite korisniku i pregledu na temelju ID-jeva
    $user = User::findOrFail($id);
    $pregled = Pregled::findOrFail($pregledId);

    // Prikazivanje blade stranice za uređivanje pregleda s podacima korisnika i pregleda
    return view('profile.pregled.edit', compact('user', 'pregled'));
}

public function updatePregled(Request $request, $id, $pregledId)
{
    // Pronalaženje korisnika i pregleda na temelju ID-jeva
    $user = User::findOrFail($id);
    $pregled = Pregled::findOrFail($pregledId);

    // Validacija unesenih podataka
    $validatedData = $request->validate([
        'bpd' => 'required',
        'hc' => 'required',
        'ac' => 'required',
        'fl' => 'required',
        'plodne_vode_ul' => 'required',
        'posteljica_ul' => 'required',
        'cervikometrija' => 'required',
        'ng' => 'required',
        'tezina_prirast' => 'required',
        'sa' => 'required',
        'edemi' => 'required',
        'varikisi' => 'required',
        'visina_fundusa_uterusa' => 'required',
        'vs' => 'required',
        'frlic' => 'required',
        'plodne_vode' => 'required',
        'posteljica' => 'required',
        'urin' => 'required',
        'e' => 'required',
        'hb' => 'required',
        'suk' => 'required',
        'fe' => 'required',
        'zapazanja' => 'required',
        'terapija' => 'required',
    ]);

    // Ažuriranje podataka pregleda
    $pregled->update($validatedData);

    // Spremanje ažuriranih podataka u bazu podataka
    $pregled->save();

    // Preusmjeravanje na profil korisnika s ažuriranim pregledom
    return redirect()->route('profile', ['id' => $user->id]);
    
}






public function dodajPregled(Request $request, $id)
{
    // Validacija podataka
    $request->validate([
        'datum_pregleda' => 'required|date',
        'bpd' => 'required',
        'hc' => 'required',
        'ac' => 'required',
        'fl' => 'required',
        'plodne_vode_ul' => 'required',
        'posteljica_ul' => 'required',
        'cervikometrija' => 'required',
        'ng' => 'required',
        'tezina_prirast' => 'required',
        'sa' => 'required',
        'edemi' => 'required',
        'varikisi' => 'required',
        'visina_fundusa_uterusa' => 'required',
        'vs' => 'required',
        'frlic' => 'required',
        'plodne_vode' => 'required',
        'posteljica' => 'required',
        'urin' => 'required',
        'e' => 'required',
        'hb' => 'required',
        'suk' => 'required',
        'fe' => 'required',
        'zapazanja' => 'required',
        'terapija' => 'required',
    ]);

    // Pristupate korisniku na osnovu ID-ja
    $user = User::findOrFail($id);

    // Kreiranje novog pregleda
    $pregled = new Pregled();
    $pregled->bpd = $request->input('bpd');
    $pregled->hc = $request->input('hc');
    $pregled->ac = $request->input('ac');
    $pregled->fl = $request->input('fl');
    $pregled->plodne_vode_ul = $request->input('plodne_vode_ul');
    $pregled->posteljica_ul = $request->input('posteljica_ul');
    $pregled->cervikometrija = $request->input('cervikometrija');
    $pregled->ng = $request->input('ng');
    $pregled->tezina_prirast = $request->input('tezina_prirast');
    $pregled->sa = $request->input('sa');
    $pregled->edemi = $request->input('edemi');
    $pregled->varikisi = $request->input('varikisi');
    $pregled->visina_fundusa_uterusa = $request->input('visina_fundusa_uterusa');
    $pregled->vs = $request->input('vs');
    $pregled->frlic = $request->input('frlic');
    $pregled->plodne_vode = $request->input('plodne_vode');
    $pregled->posteljica = $request->input('posteljica');
    $pregled->urin = $request->input('urin');
    $pregled->e = $request->input('e');
    $pregled->hb = $request->input('hb');
    $pregled->suk = $request->input('suk');
    $pregled->fe = $request->input('fe');
    $pregled->zapazanja = $request->input('zapazanja');
    $pregled->terapija = $request->input('terapija');

    // Povezivanje pregleda s korisnikom
    $pregled->user_id = $user->id;

    // Spremanje pregleda u bazu podataka
    $pregled->save();

    // Preusmjeravanje na profil korisnika
    
    return redirect()->route('profile', ['id' => $user->id]);

}





}

