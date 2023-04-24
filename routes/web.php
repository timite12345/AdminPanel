<?php

use App\Http\Controllers\AddNewChauffeur;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mission;


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


Route::get('/Mission/Details', function () {
    return view('Mission.Details');
})->name('Details');

Route::get('/Mission/Edit', function () {
    return view('Mission.Edit');
})->name('Edit');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/auth/register',[AddNewChauffeur::class, "AddChauf"])->name('chauffeur.register');

});

Route::post('/NewMission',[Controller::class, "CreateNewMission"])->name('mission');
Route::get('/AjouterMission',[Controller::class, "NewMission"])->name('NewMission');
Route::get('/Accueil',[Controller::class, "show"])->name('Accueil');

//Route::get('/dashboard',[Controller::class, "show"]);


require __DIR__.'/auth.php';
