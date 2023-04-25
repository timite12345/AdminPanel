<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Chauffeur;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
class AddChauffeur extends Controller
{
 public function CreateChauf(Request $request){
        $data['nom'] = $request->nom ;
        $data['prenom'] = $request->prenom ;
        $data['tel'] = $request->tel ;
        $data['email'] = $request->email ;
        $data['adresse'] = $request->adresse;
        $data['permis'] = $request->permis;
        $data['estDisponible'] = $request->estDisponible;
         Chauffeur::create($data);
        session()->flash('Succes','Un nouvel hopital ajouté');

        return redirect('/ListesChauffeur');
  }

  public function showChauff()
    {
        $chauffeurs = Chauffeur::latest()->paginate(4);
     return view('ListesChauffeur', compact('chauffeurs'));
    }

}
