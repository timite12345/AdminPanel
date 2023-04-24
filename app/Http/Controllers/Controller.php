<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hopital;
use App\Models\Missions;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function NewMission(){
    $users= User::all();
    $etbsantes= Hopital::all();
    return view('AjouterMission', compact('users','etbsantes'));
}


public function show()
    {
        $missions = Missions::all();
     return view('dashboard', compact('missions'));
    }



 public function CreateNewMission(Request $request){
        $data['condTransp'] = $request->condTransp ;
        $data['nom'] = $request->nom ;
        $data['prenom'] = $request->prenom ;
        $data['email'] = $request->email ;
        $data['date_Dep'] = $request->date_Dep ;
        $data['adresse_Dep'] = $request->adresse_Dep ;
        $data['adresse_Arriv'] = $request->adresse_Arriv ;
        $data['estUrgent'] = $request->estUrgent ;
        $data['estFacture'] = $request->estFacture ;
        $data['refEtb'] = $request->refEtb ;
        $data['idChauffeur'] = $request->idChauffeur ;
        Missions::create($data);
        return redirect('/welcome');
    }

     public function CreateHopital(Request $request){
        $data['refEtb'] = $request->refEtb ;
        $data['nom'] = $request->nom ;
        $data['adresseEtb'] = $request->adresseEtb ;
        $data['email'] = $request->email ;
        $data['tel'] = $request->tel ;
        $data['estValide'];
         Hopital::create($data);
        session()->flash('Succes','Un nouvel hopital ajouté');

        return redirect('/welcome');
  }
}
