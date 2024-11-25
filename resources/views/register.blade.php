@extends('layouts/profile')

@section('title', 'Home')

@section('content')

    <div class="container">
        <div class="row justify-content-center register-container">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">Dodaj novu trudnicu</div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Ime i prezime:</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group mb-3">
                                <label for="dob" class="form-label">Datum rođenja:</label>
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Adresa:</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="occupation" class="form-label">Zanimanje:</label>
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" required>
                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="marital_status" class="form-label">Bračno stanje:</label>
                                <select id="marital_status" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" required>
                                    <option value="">-- Odaberi bračno stanje --</option>
                                    <option value="Slobodna">Slobodna</option>
                                    <option value="U braku">U braku</option>
                                    <option value="Razvedena">Razvedena</option>
                                    <option value="Udovica">Udovica</option>
                                </select>
                                @error('marital_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="phone" class="form-label">Telefon:</label>
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="email" class="form-label">Email adresa:</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="password" class="form-label">Lozinka:</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="height" class="form-label">Visina:</label>
                                <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required>
                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="weight" class="form-label">Težina:</label>
                                <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required>
                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                             <div class="form-group">
                            <label for="personal_history" class="form-label">Lična anamneza:</label><br>
                            <input type="checkbox" name="personal_history[]" value="Teža oboljenja (endokrina, srčana, bubrežna)"> Teža oboljenja (endokrina, srčana, bubrežna)<br>
                            <input type="checkbox" name="personal_history[]" value="Šećerna bolest"> Šećerna bolest</br>
                            <input type="checkbox" name="personal_history[]" value="Urođene anomalije"> Urođene anomalije<br>
                            <input type="checkbox" name="personal_history[]" value="Hipertenzija"> Hipertenzija<br>
                            <input type="checkbox" name="personal_history[]" value="Operacije"> Operacije<br>
                            <input type="checkbox" name="personal_history[]" value="Pušenje"> Pušenje<br>
                            <input type="checkbox" name="personal_history[]" value="Oboljenja gastrointestinalnih organa"> Oboljenja gastrointestinalnih organa<br>
                            <input type="checkbox" name="personal_history[]" value="Neplodnost"> Neplodnost<br>
                            <input type="checkbox" name="personal_history[]" value="Sklonost ka krvarenju"> Sklonost ka krvarenju<br>
                            <input type="checkbox" name="personal_history[]" value="Kontracepcija prije trudnoće"> Kontracepcija prije trudnoće<br>
                            </div>
                            <br>

                            <div class="form-group">
                            <label for="family_history" class="form-label">Porodična anamneza:</label><br>
                            <input type="checkbox" name="family_history[]" value="Šećerna bolest"> Šećerna bolest<br>
                            <input type="checkbox" name="family_history[]" value="Urođene anomalije"> Urođene anomalije<br>
                            <input type="checkbox" name="family_history[]" value="Nasljedne anomalije"> Nasljedne anomalije<br>
                            <input type="checkbox" name="family_history[]" value="Nervne i duševne bolesti"> Nervne i duševne bolesti<br>
                            <input type="checkbox" name="family_history[]" value="Višestruke trudnoće"> Višestruke trudnoće<br>
                            <input type="checkbox" name="family_history[]" value="Hronična i sistemska oboljenja"> Hronična i sistemska oboljenja<br>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="menstrual_cycle_duration" class="form-label">Trajanje menstrualnog ciklusa:</label>
                                <input id="menstrual_cycle_duration" type="text" class="form-control @error('menstrual_cycle_duration') is-invalid @enderror" name="menstrual_cycle_duration" value="{{ old('menstrual_cycle_duration') }}" required>
                                @error('menstrual_cycle_duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="menstrual_cycle_length" class="form-label">Dužina menstrualnog ciklusa:</label>
                                <input id="menstrual_cycle_length" type="text" class="form-control @error('menstrual_cycle_length') is-invalid @enderror" name="menstrual_cycle_length" value="{{ old('menstrual_cycle_length') }}" required>
                                @error('menstrual_cycle_length')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            <br>

                            <div class="form-group">
                            <label for="note" class="form-label">Napomena:</label>
                            <textarea id="note" class="form-control @error('note') is-invalid @enderror" name="note" rows="4" required>{{ old('note') }}</textarea>
                            @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>


                            <div class="form-group">
                                <input type="hidden" name="super_admin" value="0">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Dodaj novu trudnicu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    @endsection