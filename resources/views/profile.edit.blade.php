@extends('layouts/profile')

@section('title', 'Edit Profile')

@section('content')

<div class="container">
    <div class="row justify-content-center">   
        <div class="col-sm-4">                            
            <div class="bg-white p-3 mt-3 ">  
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <p><strong>Ime i prezime:</strong> <input type="text" name="ime" value="{{ $user->ime }}"></p>
                    <p><strong>Datum rođenja:</strong> <input type="date" name="datum_rodjenja" value="{{ $user->datum_rodjenja }}"></p>
                    <p><strong>Adresa:</strong> <input type="text" name="adresa" value="{{ $user->adresa }}"></p>
                    <p><strong>Zanimajne:</strong> <input type="text" name="zanimanje" value="{{ $user->zanimanje }}"></p>
                    <p><strong>Bračno stanje:</strong> 
                        <select name="brak">
                            <option value="neozenjen/aneudata">Neoženjen/Nedaća</option>
                            <option value="neozenjen">Neoženjen</option>
                            <option value="ozenjen">Oženjen</option>
                            <option value="udovac">Udovac</option>
                            <option value="razveden">Razveden</option>
                            <option value="neudata">Neudata</option>
                            <option value="udata">Udata</option>
                            <option value="udovica">Udovica</option>
                            <option value="razvedena">Razvedena</option>
                        </select>
                    </p>                          
                    <p><strong>Telefon:</strong> <input type="text" name="telefon" value="{{ $user->telefon }}"></p>
                    <p><strong>Email:</strong> <input type="email" name="email" value="{{ $user->email }}"></p>
                    <p><strong>Visina:</strong> <input type="number" name="visina" value="{{ $user->visina }}"> cm</p>
                    <p><strong>Težina:</strong> <input type="number" name="tezina" value="{{ $user->tezina }}"> kg</p>
                    <p><strong>BMI:</strong> {{ $user->calculateBMI() }}</p>
                    
                    <button type="submit">Sačuvaj</button>
                </form>
            </div>      

            <div class="bg-white p-3 mt-3">
                <strong>Lična anamneza:</strong>
                </br></br>
                @foreach($personalHistory as $history)
                    <p>{{ $history }}</p>
                @endforeach
            </div>
                            
            <div class="bg-white p-3 mt-3">
                <strong>Porodična anamneza:</strong>
                </br></br>
                @foreach($familyHistory as $history)
                    <p>{{ $history }}</p>
                @endforeach
            </div>
          
            <div class="bg-white p-3 mt-3">
                <strong>Reproduktivna anamneza</strong>
                </br></br>
                <p>Trajanje menstrualnog ciklusa: {{ $user->menstrual_cycle_duration }}</p>
                <p>Duzina menstrualnog ciklusa: {{ $user->menstrual_cycle_length }}</p>
            </div>
            
            <div class="bg-white p-3 mt-3">
                <strong>Napomena</strong>
                </br></br>
                <p>{{ $user->note }}</p>
            </div>  
        </div> 
    </div>
</div>
@endsection

