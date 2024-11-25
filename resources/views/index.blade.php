@extends('layout')

@section('title', 'Home')

@section('content')
    @guest
        <script>window.location = "{{ route('login') }}";</script>
    @endguest

    @auth
        @if(auth()->user() && auth()->user()->SuperAdmin ?? false)
            <div class="container">
                <h2 class="text-center mb-4">Lista trudnica</h2>

                <!-- Search Bar -->
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Pretraži po imenu ili prezimenu...">
                </div>

                @if(isset($users) && count($users) > 0)
                    <!-- Desktop View -->
                    <div class="d-none d-lg-block">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ime i prezime</th>
                                    <th>Datum rođenja</th>
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
                    </div>

                    <!-- Mobile View -->
                    <div class="d-lg-none" id="userMobileList">
                        @foreach($users as $user)
                            @if($user->SuperAdmin == 0)
                                <div class="user-card mb-3 p-3 shadow-sm">
                                    <p class="fw-bold fs-5">{{ $user->ime }}</p>
                                    <p><strong>Datum rođenja:</strong> {{ \Carbon\Carbon::parse($user->datum_rodjenja)->format('d.m.Y.') }}</p>
                                    <p><strong>Adresa:</strong> {{ $user->adresa }}</p>
                                    <p><strong>Zanimanje:</strong> {{ $user->zanimanje }}</p>
                                    <p><strong>Telefon:</strong> {{ $user->telefon }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                    <a href="{{ route('profile', $user->id) }}" class="btn btn-primary btn-sm w-100 mt-2">Pogledaj profil</a>
                                    <hr>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <p class="text-center">Nema dostupnih korisnika.</p>
                @endif
            </div>
        @else
            <div class="container">
                <h1 class="text-center">Pristup odbijen</h1>
                <p class="text-center">Nemate dozvolu za pristup ovoj stranici.</p>
            </div>
        @endif
    @endauth

    <script>
        // Pretraga
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#userTable tr'); // Desktop rows
            const cards = document.querySelectorAll('#userMobileList .user-card'); // Mobile cards

            // Filter za desktop
            rows.forEach(row => {
                const name = row.querySelector('td').textContent.toLowerCase();
                row.style.display = name.includes(filter) ? '' : 'none';
            });

            // Filter za mobilne
            cards.forEach(card => {
                const name = card.querySelector('.fw-bold').textContent.toLowerCase();
                card.style.display = name.includes(filter) ? '' : 'none';
            });
        });
    </script>

    <style>
        /* Mobile card styles */
        .user-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            width: 100%; /* Full width */
            font-size: 1.5rem; /* Slightly larger text */
        }

        .user-card p {
            margin: 8px 0; /* Increase spacing between lines */
            line-height: 1.5; /* Better readability */
        }

        .user-card .btn {
            font-size: 1rem;
            padding: 10px;
        }

        .user-card hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 15px 0;
        }

        /* General styling */
        .container {
            margin-top: 20px;
        }

        /* Ensure mobile view is comfortable */
        @media (max-width: 768px) {
            body {
                padding: 0 10px; /* Add padding for smaller screens */
            }

            .user-card {
                margin-bottom: 20px; /* Add spacing between cards */
                font-size: 1.1rem; /* Larger font size for readability */
            }

            .user-card p {
                font-size: 1rem; /* Text size adjustment for mobile */
            }
        }
    </style>
@endsection
