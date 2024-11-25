@extends('../layouts/profile')

@section('title', 'Edit Profile')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="bg-white p-3 mt-3">
                <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="ime" class="form-label">Ime i prezime:</label>
                        <input type="text" name="ime" class="form-control" value="{{ $user->ime }}">
                    </div>
                    <div class="mb-3">
                        <label for="datum_rodjenja" class="form-label">Datum rođenja:</label>
                        <input type="date" name="datum_rodjenja" class="form-control" value="{{ $user->datum_rodjenja }}">
                    </div>
                    <div class="mb-3">
                        <label for="adresa" class="form-label">Adresa:</label>
                        <input type="text" name="adresa" class="form-control" value="{{ $user->adresa }}">
                    </div>
                    <div class="mb-3">
                        <label for="zanimanje" class="form-label">Zanimanje:</label>
                        <input type="text" name="zanimanje" class="form-control" value="{{ $user->zanimanje }}">
                    </div>
                    <div class="mb-3">
                        <label for="brak" class="form-label">Bračno stanje:</label>
                        <select name="brak" class="form-control">
                            <option value="Slobodna" {{ $user->brak === 'Slobodna' ? 'selected' : '' }}>Slobodna</option>
                            <option value="U braku" {{ $user->brak === 'U braku' ? 'selected' : '' }}>U braku</option>
                            <option value="Razvedena" {{ $user->brak === 'Razvedena' ? 'selected' : '' }}>Razvedena</option>
                            <option value="Udovica" {{ $user->brak === 'Udovica' ? 'selected' : '' }}>Udovica</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefon" class="form-label">Telefon:</label>
                        <input type="text" name="telefon" class="form-control" value="{{ $user->telefon }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="visina" class="form-label">Visina (cm):</label>
                        <input type="number" name="visina" class="form-control" value="{{ $user->visina }}">
                    </div>
                    <div class="mb-3">
                        <label for="tezina" class="form-label">Težina (kg):</label>
                        <input type="number" name="tezina" class="form-control" value="{{ $user->tezina }}">
                    </div>

                    
            </div>

            <div class="bg-white p-3 mt-3">
                <strong>Lična anamneza:</strong>
                </br></br>                
                    @foreach(['Teža oboljenja (endokrina, srčana, bubrežna)', 'Šećerna bolest', 'Urođene anomalije', 'Hipertenzija', 'Operacije', 'Pušenje', 'Oboljenja gastrointestinalnih organa', 'Neplodnost', 'Sklonost ka krvarenju', 'Kontracepcija prije trudnoće'] as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="personal_history[]" value="{{ $option }}" @if(in_array($option, $personalHistory)) checked @endif>
                            <label class="form-check-label" for="personal_history[]">{{ $option }}</label>
                        </div>
                    @endforeach                    
            </div>

            <div class="bg-white p-3 mt-3">
                <strong>Porodična anamneza:</strong>
                </br></br>                
                    @foreach(['Šećerna bolest', 'Urođene anomalije', 'Nasljedne anomalije', 'Nervne i duševne bolesti', 'Hronična i sistemska oboljenja'] as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="family_history[]" value="{{ $option }}" @if(in_array($option, $familyHistory)) checked @endif>
                            <label class="form-check-label" for="family_history[]">{{ $option }}</label>
                        </div>
                    @endforeach                    
            </div>

            <div class="bg-white p-3 mt-3">
                <strong>Reproduktivna anamneza</strong>
                </br></br>
                
                    <div class="mb-3">
                        <label for="menstrual_cycle_duration" class="form-label">Trajanje menstrualnog ciklusa:</label>
                        <input type="text" name="menstrual_cycle_duration" class="form-control" value="{{ $user->menstrual_cycle_duration }}">
                    </div>
                    <div class="mb-3">
                        <label for="menstrual_cycle_length" class="form-label">Duzina menstrualnog ciklusa:</label>
                        <input type="text" name="menstrual_cycle_length" class="form-control" value="{{ $user->menstrual_cycle_length }}">
                    </div>                    
            </div>

            <div class="bg-white p-3 mt-3">
                <strong>Napomena</strong>
                </br></br>                
                    <div class="mb-3">
                        <label for="note" class="form-label">Napomena:</label>
                        <textarea name="note" rows="4" class="form-control">{{ $user->note }}</textarea>
                    </div>                    
            </div>
                <div class="col" style="margin-bottom: 15px;"></div> 
                <button class="btn btn-primary btn-block" type="submit">Sačuvaj unešene podatke</button>
                </form>
                <div class="col" style="margin-bottom: 70px;"></div>    
        </div>
    </div>
</div>
@endsection


