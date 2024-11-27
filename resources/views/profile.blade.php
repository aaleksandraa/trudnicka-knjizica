@extends('layouts/profile')

@section('title', 'Home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            
            <div class="bg-white p-3 mt-4">                              
                <p><strong>Ime i prezime:</strong> {{ $user->ime }}</p>                
                <p><strong>Datum rođenja:</strong> {{ \Carbon\Carbon::parse($user->datum_rodjenja)->format('d.m.Y.') }}</p>
                <p><strong>Adresa:</strong> {{ $user->adresa }}</p>
                <p><strong>Zanimanje:</strong> {{ $user->zanimanje }}</p>
                <p><strong>Bračno stanje:</strong> {{ $user->brak }}</p>                          
                <p><strong>Telefon:</strong> {{ $user->telefon }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Visina:</strong> {{ $user->visina }} cm</p>
                <p><strong>Težina:</strong> {{ $user->tezina }} kg</p>
                <p><strong>BMI:</strong> {{ $user->calculateBMI() }}</p>           
            </div>

            <div class="bg-white p-3 mt-3">
                <strong>Lična anamneza::</strong>
                <br><br>
                @foreach($personalHistory as $history)
                    <p>{{ $history }}</p>
                @endforeach
            </div>

            <div class="bg-white p-3 mt-3">
                <strong>Porodična anamneza::</strong>
                <br><br>
                @foreach($familyHistory as $history)
                    <p>{{ $history }}</p>
                @endforeach
            </div>

            <div class="bg-white p-3 mt-3">
                <strong>Reproduktivna anamneza</strong>
                <br><br>
                <p>Trajanje menstrualnog ciklusa: {{ $user->menstrual_cycle_duration }}</p>
                <p>Duzina menstrualnog ciklusa: {{ $user->menstrual_cycle_length }}</p>
            </div>

            <div class="bg-white p-3 mt-3">
                <strong>Napomena:</strong>
                <br><br>
                <p>{{ $user->note }}</p>
            </div>

            
            @guest
            <script>window.location = "{{ route('login') }}";</script>
            @endguest

            @auth
            @if(auth()->user() && auth()->user()->SuperAdmin ?? false)
            <div class="bg-white p-3 mt-3">                            
                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary btn-block">Izmijeni osnovne podatke trudnice</a>
            </div>
            
                @else
                
                @endif
                @endauth
        </div>


        
        <div class="col-sm-8">
    <!-- Appointments -->
    <div class="row bg-white p-3 mt-3">
        @if ($sledeciPregled)
        <h5>Sledeći pregled: {{ \Carbon\Carbon::parse($sledeciPregled->datum_pregleda)->format('d.m.Y.') }}</h5>

        @else
            <p>No scheduled appointments.</p>
        @endif
        @if(auth()->user() && auth()->user()->SuperAdmin ?? false)
            <a href="{{ route('pregled.dodaj', ['id' => $user->id]) }}" class="btn btn-secondary ml-auto">Dodaj pregled</a>
            
        @endif
    
</div>


            <div class="row">
                @foreach ($pregledi->reverse() as $pregled)

                        <div class="bg-white border p-3 mt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6>Datum pregleda: {{ \Carbon\Carbon::parse($pregled->datum_pregleda)->format('d.m.Y.') }}</h6>
                                        
                                        @auth
                                        @if(auth()->user() && auth()->user()->SuperAdmin ?? false)
                                        <a href="{{ route('pregled.edit', ['id' => $user->id, 'pregledId' => $pregled->id]) }}">Uredi pregled</a>
                                        @else
                
                                        @endif
                                        @endauth
                                    </div>
                    
                        

                            <!-- Ultrasonic -->
                            <div class="bg-white p-3 mt-3">
                                <h5>Ultrazvučni pregledi</h5> </br>
                                <p>BPD: {{ $pregled->bpd }}</p>
                                <p>HC: {{ $pregled->hc }}</p>
                                <p>AC: {{ $pregled->ac }}</p>
                                <p>FL: {{ $pregled->fl }}</p>
                                <p>Plodne vode: {{ $pregled->plodne_vode_ul }}</p>
                                <p>Posteljica: {{ $pregled->posteljica_ul }}</p>
                                <p>Cervikometrija: {{ $pregled->cervikometrija }}</p>
                            </div>

                            <hr/>

                            <!-- Clinical -->
                            <div class="bg-white p-3 mt-3">
                                <h5>Klinički pregled</h5> </br>
                                <p>NG: {{ $pregled->ng }}</p>
                                <p>Težina prirast: {{ $pregled->tezina_prirast }}</p>
                                <p>SA: {{ $pregled->sa }}</p>
                                <p>Edemi: {{ $pregled->edemi }}</p>
                                <p>Varikisi: {{ $pregled->varikisi }}</p>
                                <p>Visina fundusa uterusa: {{ $pregled->visina_fundusa_uterusa }}</p>
                                <p>VS: {{ $pregled->vs }}</p>
                                <p>Grlić: {{ $pregled->frlic }}</p>
                                <p>Plodne vode: {{ $pregled->plodne_vode }}</p>
                                <p>Posteljica: {{ $pregled->posteljica }}</p>
                            </div>

                            <hr/>

                            <!-- Laboratory -->
                            <div class="bg-white p-3 mt-3">
                                <h5>Laboratorijski nalazi</h5> </br>
                                <p>Urin: {{ $pregled->urin }}</p>
                                <p>E: {{ $pregled->e }}</p>
                                <p>HB: {{ $pregled->hb }}</p>
                                <p>SUK: {{ $pregled->suk }}</p>
                                <p>FE: {{ $pregled->fe }}</p>                                
                            </div>
                            <hr/>

                            <div class="bg-white p-3 mt-3">
                                <h5>Zapažanja:</h5> </br>
                                <p>{{ $pregled->zapazanja }}</p>
                            </div> 

                            <div class="bg-white p-3 mt-3">
                                <h5>Terapija:</h5> </br>
                                <p>{{ $pregled->terapija }}</p>
                            </div> 
                    
                    
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

