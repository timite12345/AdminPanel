<?php

use App\Http\Controllers\AddChauffeur;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/auth/register', function () {
    return view('auth.register');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/AddNewChauffeur', function () {
    return view('AddNewChauffeur');
});

Route::get('/ListesChauffeur', function () {
    return view('ListesChauffeur');
});
//
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update1'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy1'])->name('profile.destroy');

});

Route::post('/NewMission',[Controller::class, "CreateNewMission"])->name('mission');
Route::get('/AjouterMission',[Controller::class, "NewMission"])->name('NewMission');
Route::get('/Accueil',[Controller::class, "show"])->name('Accueil');
Route::get('/Supprimer/{id}', [Controller::class, 'destroy'])->name('Supprimer');
Route::get('/Modifier/{id}', [Controller::class, 'modifier'])->name('Edit');
Route::get('/Voir/{id}', [Controller::class, 'voir'])->name('Details');
Route::post('/AddNewChauffeur',[AddChauffeur::class, "CreateChauf"])->name('addChauffeur');
Route::get('/ListesChauffeur',[AddChauffeur::class, "showChauff"])->name('SelectChauffeur');




require __DIR__.'/auth.php';
