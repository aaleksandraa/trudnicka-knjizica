@extends('layouts/profile')

@section('title', 'Dodaj pregled')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="bg-grey p-3 mt-3">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                <form action="{{ route('pregled.sacuvaj') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 

                    

                    <!-- Datum pregleda -->
                    <div class="bg-white p-3 mt-3 border rounded">
                        <h5 class="text-primary">Osnovne informacije</h5>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2">
                                <label for="datum_pregleda" class="form-label">Datum pregleda:</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="datum_pregleda" id="datum_pregleda" class="form-control" placeholder="D.M.Y">
                            </div>
                        </div>
                    </div>
                    
                    

                    <!-- Ultrazvučni pregledi -->
                    <div class="bg-white p-3 mt-3 border rounded">
                        <h5 class="text-primary">Ultrazvučni pregledi</h5>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="bpd" class="form-label">BPD:</label></div>
                            <div class="col-md-8"><input type="text" name="bpd" class="form-control" placeholder="Unesite BPD"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="hc" class="form-label">HC:</label></div>
                            <div class="col-md-8"><input type="text" name="hc" class="form-control" placeholder="Unesite HC"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="ac" class="form-label">AC:</label></div>
                            <div class="col-md-8"><input type="text" name="ac" class="form-control" placeholder="Unesite AC"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="fl" class="form-label">FL:</label></div>
                            <div class="col-md-8"><input type="text" name="fl" class="form-control" placeholder="Unesite FL"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="plodne_vode_ul" class="form-label">Plodne vode:</label></div>
                            <div class="col-md-8"><input type="text" name="plodne_vode_ul" class="form-control" placeholder="Unesite količinu plodnih voda"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="posteljica_ul" class="form-label">Posteljica:</label></div>
                            <div class="col-md-8"><input type="text" name="posteljica_ul" class="form-control" placeholder="Unesite podatke o posteljici"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="cervikometrija" class="form-label">Cervikometrija:</label></div>
                            <div class="col-md-8"><input type="text" name="cervikometrija" class="form-control" placeholder="Unesite podatke o cervikometriji"></div>
                        </div>
                    </div>

                    <!-- Klinički pregled -->
                    <div class="bg-white p-3 mt-3 border rounded">
                        <h5 class="text-primary">Klinički pregled</h5>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="ng" class="form-label">NG:</label></div>
                            <div class="col-md-8"><input type="text" name="ng" class="form-control" placeholder="Unesite NG"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="tezina_prirast" class="form-label">Težina prirast:</label></div>
                            <div class="col-md-8"><input type="text" name="tezina_prirast" class="form-control" placeholder="Unesite težinu"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="sa" class="form-label">SA:</label></div>
                            <div class="col-md-8"><input type="text" name="sa" class="form-control" placeholder="Unesite SA"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="edemi" class="form-label">Edemi:</label></div>
                            <div class="col-md-8"><input type="text" name="edemi" class="form-control" placeholder="Unesite edeme"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="varikisi" class="form-label">Varikisi:</label></div>
                            <div class="col-md-8"><input type="text" name="varikisi" class="form-control" placeholder="Unesite varikise"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="visina_fundusa_uterusa" class="form-label">Visina fundusa uterusa:</label></div>
                            <div class="col-md-8"><input type="text" name="visina_fundusa_uterusa" class="form-control" placeholder="Unesite visinu fundusa uterusa"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="vs" class="form-label">VS:</label></div>
                            <div class="col-md-8"><input type="text" name="vs" class="form-control" placeholder="Unesite VS"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="frlic" class="form-label">Grlić:</label></div>
                            <div class="col-md-8"><input type="text" name="frlic" class="form-control" placeholder="Unesite stanje grlića"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="plodne_vode" class="form-label">Plodne vode:</label></div>
                            <div class="col-md-8"><input type="text" name="plodne_vode" class="form-control" placeholder="Unesite plodne vode"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="posteljica" class="form-label">Posteljica:</label></div>
                            <div class="col-md-8"><input type="text" name="posteljica" class="form-control" placeholder="Unesite posteljicu"></div>
                        </div>
                    </div>

                    <!-- Laboratorijski nalazi -->
                    <div class="bg-white p-3 mt-3 border rounded">
                        <h5 class="text-primary">Laboratorijski nalazi</h5>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="urin" class="form-label">Urin:</label></div>
                            <div class="col-md-8"><input type="text" name="urin" class="form-control" placeholder="Unesite nalaze urina"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="e" class="form-label">E:</label></div>
                            <div class="col-md-8"><input type="text" name="e" class="form-control" placeholder="Unesite E"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="hb" class="form-label">HB:</label></div>
                            <div class="col-md-8"><input type="text" name="hb" class="form-control" placeholder="Unesite HB"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="suk" class="form-label">SUK:</label></div>
                            <div class="col-md-8"><input type="text" name="suk" class="form-control" placeholder="Unesite SUK"></div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2"><label for="fe" class="form-label">FE:</label></div>
                            <div class="col-md-8"><input type="text" name="fe" class="form-control" placeholder="Unesite FE"></div>
                        </div>
                    </div>

                    <!-- Zapažanja -->
                    <div class="bg-white p-3 mt-3 border rounded">
                        <h5 class="text-primary">Zapažanja</h5>
                        <textarea name="zapazanja" class="form-control" placeholder="Unesite zapažanja"></textarea>
                    </div>

                    <!-- Terapija -->
                    <div class="bg-white p-3 mt-3 border rounded">
                        <h5 class="text-primary">Terapija</h5>
                        <textarea name="terapija" class="form-control" placeholder="Unesite terapiju"></textarea>
                    </div>

                    <!-- Sačuvaj dugme -->
                    <button type="submit" class="btn btn-primary btn-block mt-3">Sačuvaj</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateInput = document.querySelector('#datum_pregleda');

        // Postavljanje trenutnog datuma u EU formatu
        const currentDate = new Date();
        const formattedDate = `${currentDate.getDate()}.${currentDate.getMonth() + 1}.${currentDate.getFullYear()}`;
        dateInput.value = formattedDate;

        // Konvertovanje EU formata u standardni ISO format za slanje forme
        dateInput.addEventListener('blur', function () {
            const euDate = dateInput.value.split('.');
            if (euDate.length === 3) {
                const day = euDate[0].padStart(2, '0');
                const month = euDate[1].padStart(2, '0');
                const year = euDate[2];
                dateInput.value = `${year}-${month}-${day}`; // Pretvaranje u ISO format
            }
        });

        // Prikazivanje datuma u EU formatu nakon ponovnog učitavanja stranice
        dateInput.addEventListener('focus', function () {
            const isoDate = dateInput.value.split('-');
            if (isoDate.length === 3) {
                const year = isoDate[0];
                const month = isoDate[1];
                const day = isoDate[2];
                dateInput.value = `${day}.${month}.${year}`; // Pretvaranje u EU format
            }
        });
    });
</script>

@endsection
