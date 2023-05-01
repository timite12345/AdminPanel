<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\Facture;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hopital;
use App\Models\Mission;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function NewMission(){
    $hopitals= Hopital::all();
    $chauffeurs=Chauffeur::all();
    $missions = Mission::all();
    $factures = Facture::all();
    return view('AjouterMission',
        [
        'hopitals' => $hopitals,
        'chauffeurs' => $chauffeurs,
        'missions' =>$missions,
        'factures' =>$factures,
        ],
    );

}


public function show()
    {
        $missions = Mission::latest()->paginate(4);
     return view('dashboard', compact('missions'));
    }

 public function destroye($mission)
    {
        Mission::findOrFail($mission)->delete();
        return back()->with('message',"L'achat supprimé avec succès");
    }

    public function modifier(Mission $missions)
    {
       // $missions = Missions::all();
     return view('Mission.Edit', compact('missions'));
    }

    public function voir(Mission $missions)
    {
        $missions = Mission::all();
     return view('Mission.Details', compact('missions'));
    }

 public function update1(Request $request, Mission $missions)
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
        Mission::create($data);
        return redirect('/Accueil');
    }
}
