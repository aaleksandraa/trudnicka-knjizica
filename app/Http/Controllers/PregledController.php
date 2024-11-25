<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pregled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PregledController extends Controller
{
    public function dodaj($id)
{
    $user = User::find($id); // Provjera da li postoji korisnik
    if (!$user) {
        abort(404, 'Korisnik nije pronađen');
    }
    return view('pregled.dodaj', ['user' => $user]);
}

    public function sacuvaj(Request $request)
    {
        // Validacija unosa
    $validatedData = $request->validate([
        'datum_pregleda' => 'required|date',
        'bpd' => 'required|string',
        'hc' => 'required|string',
        'ac' => 'required|string',
        'fl' => 'required|string',
        'plodne_vode_ul' => 'required|string',
        'posteljica_ul' => 'required',
        'cervikometrija' => 'required',
        'ng' => 'required|string',
        'tezina_prirast' => 'required|string',
        'sa' => 'required',
        'edemi' => 'required',
        'varikisi' => 'required',
        'visina_fundusa_uterusa' => 'required|string',
        'vs' => 'required',
        'frlic' => 'required',
        'plodne_vode' => 'required',
        'posteljica' => 'required',
        'urin' => 'required|string',
        'e' => 'required',
        'hb' => 'required|string',
        'suk' => 'required|string',
        'fe' => 'required|string',
        'zapazanja' => 'required',
        'terapija' => 'required',
    ]);

        // Kreiranje novog pregleda na osnovu podataka iz zahteva
        $pregled = new Pregled();
        $pregled->user_id = $request->user_id;
        $pregled->datum_pregleda = $request->datum_pregleda;
        $pregled->bpd = $request->bpd;
        $pregled->hc = $request->hc;
        $pregled->ac = $request->ac;
        $pregled->fl = $request->fl;
        $pregled->plodne_vode_ul = $request->plodne_vode_ul;
        $pregled->posteljica_ul = $request->posteljica_ul;
        $pregled->cervikometrija = $request->cervikometrija;
        $pregled->ng = $request->ng;
        $pregled->tezina_prirast = $request->tezina_prirast;
        $pregled->sa = $request->sa;
        $pregled->edemi = $request->edemi;
        $pregled->varikisi = $request->varikisi;
        $pregled->visina_fundusa_uterusa = $request->visina_fundusa_uterusa;
        $pregled->vs = $request->vs;
        $pregled->frlic = $request->frlic;
        $pregled->plodne_vode = $request->plodne_vode;
        $pregled->posteljica = $request->posteljica;
        $pregled->urin = $request->urin;
        $pregled->e = $request->e;
        $pregled->hb = $request->hb;
        $pregled->suk = $request->suk;
        $pregled->fe = $request->fe;
        $pregled->zapazanja = $request->zapazanja;
        $pregled->terapija = $request->terapija;
        // Čuvanje pregleda u bazi podataka
        $pregled->save();

          // Preusmeravanje na profil korisnika
          
          return redirect()->route('profile', ['id' => $request->user_id])->with('success', 'Pregled je uspješno sačuvan!');

        } 
            
    }

