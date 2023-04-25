<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
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
    // $users= User::all();
    $hopitals= Hopital::all();
    $chauffeurs=Chauffeur::all();
    return view('AjouterMission',
        [
        'hopitals' => $hopitals,
        'chauffeurs' => $chauffeurs,
        ],
    );

}


public function show()
    {
        $missions = Missions::latest()->paginate(4);
     return view('dashboard', compact('missions'));
    }

 public function destroy1($mission)
    {
        Missions::findOrFail($mission)->delete();
        return back()->with('message',"L'achat supprimé avec succès");
    }

    public function modifier(Missions $missions)
    {
       // $missions = Missions::all();
     return view('Mission.Edit', compact('missions'));
    }

    public function voir(Missions $missions)
    {
        $missions = Missions::all();
     return view('Mission.Details', compact('missions'));
    }

 public function update1(Request $request, Missions $missions)
    {
        $request->validate([
            'nom_client' => 'required',
            'tel_client' => 'required',
            'article_id' => 'required',
            'nombre_article' => 'required',
            'montant_article' => 'required',
        ]);

        $missions->update($request->all());

        return back()->with('message','Achat modifié avec succès');
    }

 public function CreateNewMission(Request $request){

    $data= $request->all();
// $mission= Missions::create(
//     [
//         'nom' => $request->nom ,
//      'prenom' => $request->prenom ,
//      'email' => $request->email ,
//         'date_Dep' => $request->date_Dep ,
//      'adresse_Dep' => $request->adresse_Dep ,
//         'adresse_Arriv' => $request->adresse_Arriv ,
//         'estUrgent' => $request->estUrgent ,
//         'estFacture'=> $request->estFacture ,
//         'refEtb' => $request->refEtb ,
//         'idChauffeur' => $request->idChauffeur ,
//         'condTransp' =>$request->condTransp,
//     ]
//     );
        // $data['nom'] = $request->nom ;
        // $data['prenom'] = $request->prenom ;
        // $data['email'] = $request->email ;
        // $data['date_Dep'] = $request->date_Dep ;
        // $data['adresse_Dep'] = $request->adresse_Dep ;
        // $data['adresse_Arriv'] = 1 ;
        // $data['estUrgent'] = $request->estUrgent ;
        // $data['estFacture'] = $request->estFacture ;
        // $data['refEtb'] = $request->refEtb ;
        // $data['idChauffeur'] = $request->idChauffeur ;
        // $data['condTransp'] = 2 ;

        Missions::create($data);
        return redirect('/Accueil');
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
