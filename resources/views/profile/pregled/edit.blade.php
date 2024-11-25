@extends('layouts/profile')

@section('title', 'Home')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="bg-white p-3 mt-3">
        <form action="{{ route('pregled.update', ['id' => $user->id, 'pregledId' => $pregled->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="d-flex justify-content-between align-items-center">
                <h6>Datum pregleda: {{ $pregled->datum_pregleda }}</h6>               
            </div>



            <div class="mb-3">
    <h5>Ultrazvučni pregledi</h5>
</br>
    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="bpd" class="form-label">BPD:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="bpd" class="form-control" value="{{ $pregled->bpd }}">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="hc" class="form-label">HC:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="hc" class="form-control" value="{{ $pregled->hc }}">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="ac" class="form-label">AC:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="ac" class="form-control" value="{{ $pregled->ac }}">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="fl" class="form-label">FL:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="fl" class="form-control" value="{{ $pregled->fl }}">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="plodne_vode_ul" class="form-label">Plodne vode:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="plodne_vode_ul" class="form-control" value="{{ $pregled->plodne_vode_ul }}">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="posteljica_ul" class="form-label">Posteljica:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="posteljica_ul" class="form-control" value="{{ $pregled->posteljica_ul }}">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="cervikometrija" class="form-label">Cervikometrija:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="cervikometrija" class="form-control" value="{{ $pregled->cervikometrija }}">
        </div>
    </div>
    <!-- Ostala polja Ultrazvučnog pregleda -->
</div>
</div>


<!-- Clinical -->
<div class="bg-white p-3 mt-3">
    <div class="mb-3">
        <h5>Klinički pregled</h5>
        </br>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="ng" class="form-label">NG:</label>
                    <input type="text" name="ng" class="form-control" value="{{ $pregled->ng }}">
                </div>
                <div class="mb-3">
                    <label for="tezina_prirast" class="form-label">Težina prirast:</label>
                    <input type="text" name="tezina_prirast" class="form-control" value="{{ $pregled->tezina_prirast }}">
                </div>
                <div class="mb-3">
                    <label for="sa" class="form-label">SA:</label>
                    <input type="text" name="sa" class="form-control" value="{{ $pregled->sa }}">
                </div>
                <div class="mb-3">
    <label for="edemi" class="form-label">Edemi:</label>
    <input type="text" name="edemi" class="form-control" value="{{ $pregled->edemi }}">
</div>
<div class="mb-3">
    <label for="varikisi" class="form-label">Varikisi:</label>
    <input type="text" name="varikisi" class="form-control" value="{{ $pregled->varikisi }}">
</div>
</div>
<div class="col-md-6">
<div class="mb-3">
    <label for="visina_fundusa_uterusa" class="form-label">Visina fundusa uterusa:</label>
    <input type="text" name="visina_fundusa_uterusa" class="form-control" value="{{ $pregled->visina_fundusa_uterusa }}">
</div>
<div class="mb-3">
    <label for="vs" class="form-label">VS:</label>
    <input type="text" name="vs" class="form-control" value="{{ $pregled->vs }}">
</div>
<div class="mb-3">
    <label for="frlic" class="form-label">Grlić:</label>
    <input type="text" name="frlic" class="form-control" value="{{ $pregled->frlic }}">
</div>
<div class="mb-3">
    <label for="plodne_vode" class="form-label">Plodne vode:</label>
    <input type="text" name="plodne_vode" class="form-control" value="{{ $pregled->plodne_vode }}">
</div>
<div class="mb-3">
    <label for="posteljica" class="form-label">Posteljica:</label>
    <input type="text" name="posteljica" class="form-control" value="{{ $pregled->posteljica }}">
</div>
</div>
</div>
</div></div>

<!-- Laboratory -->
<div class="bg-white p-3 mt-3">
<div class="mb-3">
    <h5>Laboratorijski nalazi</h5>

    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="urin" class="form-label">Urin:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="urin" class="form-control" value="{{ $pregled->urin }}">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-2">
        <label for="e" class="form-label">E:</label>
        </div>
        <div class="col-md-8">
        <input type="text" name="e" class="form-control" value="{{ $pregled->e }}">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-2">
        <label for="hb" class="form-label">HB:</label>
        </div>
        <div class="col-md-8">
        <input type="text" name="hb" class="form-control" value="{{ $pregled->hb }}">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="suk" class="form-label">SUK:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="suk" class="form-control" value="{{ $pregled->suk }}">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-2">
            <label for="fe" class="form-label">FE:</label>
        </div>
        <div class="col-md-8">
            <input type="text" name="fe" class="form-control" value="{{ $pregled->fe }}">
        </div>
    </div>


    
       
</div> 
</div> 


<!-- zapazanja -->
<div class="bg-white p-3 mt-3">
    <div class="mb-3">
        <h5>Zapažanja:</h5>
        <textarea name="zapazanja" class="form-control">{{ $pregled->zapazanja }}</textarea>
    </div> 
</div> 

<!-- terapija -->
<div class="bg-white p-3 mt-3">
    <div class="mb-3">
        <h5>Terapija:</h5>
        <textarea name="terapija" class="form-control">{{ $pregled->terapija }}</textarea>
    </div> 
</div>

        
  



<button type="submit" class="btn btn-primary btn-block">Sačuvaj</button>
</form>

<div class="col" style="margin-bottom: 70px;"></div>  
</div>          
@endsection

