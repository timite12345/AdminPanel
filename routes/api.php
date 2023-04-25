<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MissionController;
use App\Http\Controllers\API\HopitalController;
use App\Http\Controllers\API\ChauffeurController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('mission', MissionController::class);
Route::apiResource('chauffeur', ChauffeurController::class);
Route::apiResource('hopital', HopitalController::class);

