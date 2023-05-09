<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;

class HeureDebutController extends Controller
{
    public function updateheuredeb( Request $request, $id){
         $mission= Mission::findOrFail($id);
     $timestamp = date('Y-m-d H:i:s', strtotime($request->heureDebut));
     $mission->update([
        'heureDebut'=>$timestamp,
    ]);
    }

}
