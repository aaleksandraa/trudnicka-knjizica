@extends('layout')

@section('title', 'Home')

@section('content')
    @guest
        <script>window.location = "{{ route('login') }}";</script>
    @endguest

    @auth
                @if(auth()->user() && auth()->user()->SuperAdmin ?? false)

        
            <div class="container">
                <h2>Lista trudnica</h2>
                <br>
                 <!-- Search Bar -->
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Pretraži po imenu ili prezimenu...">
                </div>

                @if(isset($users) && count($users) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ime i prezime</th>
                                <th>Datum Rodjenja</th>
                                <th>Adresa</th>
                                <th>Zanimanje</th>
                                <th>Telefon</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="userTable">
                            @foreach($users as $user)
                                @if($user->SuperAdmin == 0)
                                    <tr onclick="window.location='{{ route('profile', $user->id) }}';">
                                        <td>{{ $user->ime }}</td>
                                        <td>{{ \Carbon\Carbon::parse($user->datum_rodjenja)->format('d.m.Y.') }}</td>
                                        <td>{{ $user->adresa }}</td>
                                        <td>{{ $user->zanimanje }}</td>
                                        <td>{{ $user->telefon }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No users found.</p>
                @endif
            </div>
        @else
            <div class="container">
                <h1>Access Denied</h1>
                <p>You don't have permission to access this page.</p>
            </div>
        @endif
    @endauth

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase(); // Uzimanje vrijednosti iz inputa i pretvaranje u mala slova
            const rows = document.querySelectorAll('#userTable tr'); // Selekcija svih redova u tabeli
    
            rows.forEach(row => {
                const name = row.querySelector('td').textContent.toLowerCase(); // Prvi stupac u redu (Ime i prezime)
                if (name.includes(filter)) {
                    row.style.display = ''; // Prikaz reda ako sadrži traženi tekst
                } else {
                    row.style.display = 'none'; // Sakrivanje reda ako ne sadrži traženi tekst
                }
            });
        });
    </script>
    

@endsection
