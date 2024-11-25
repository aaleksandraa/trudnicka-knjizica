<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PregledController;



Route::get('/', function () {
    return view('index');
});

// Rute za izmjenu i čuvanje podataka trudnica
Route::get('/profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile/{id}', 'ProfileController@update')->name('profile.update');

Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/', [UserController::class, 'index'])->name('index');

// Za profile trudnica
// Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');

// Za profile trudnica
Route::get('/profile-trudnica/{id}', [UserController::class, 'profile'])->name('profile.trudnica');


// Za profile
Route::get('/profile/{id}', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('/profile/{id}/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/{id}/personal-history', [ProfileController::class, 'updatePersonalHistory'])->name('profile.updatePersonalHistory');
Route::put('/profile/{id}/family-history', [ProfileController::class, 'updateFamilyHistory'])->name('profile.updateFamilyHistory');
Route::put('/profile/{id}/reproductive-history', [ProfileController::class, 'updateReproductiveHistory'])->name('profile.updateReproductiveHistory');
Route::put('/profile/{id}/note', [ProfileController::class, 'updateNote'])->name('profile.updateNote');

// Login rute
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Registracijske rute
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Ruta za odjavu
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// izmjena pregleda
Route::get('profile/{id}/pregled/{pregledId}/edit', [ProfileController::class, 'editPregled'])->name('pregled.edit');

//update pregleda
Route::put('profile/{id}/pregled/{pregledId}/edit', [ProfileController::class, 'updatePregled'])->name('pregled.update');

// za dodavanje novog pregleda
Route::post('/pregled/dodaj/{id}', [PregledController::class, 'sacuvaj'])->name('pregled.sacuvaj');

Route::get('/pregled/dodaj/{id}', [PregledController::class, 'dodaj'])->name('pregled.dodaj');
Route::post('/pregled/sacuvaj', [PregledController::class, 'sacuvaj'])->name('pregled.sacuvaj');




