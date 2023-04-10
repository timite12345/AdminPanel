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

class AddNewChauffeur extends Controller
{
 public function AddChauf(Request $request){
        $data['name'] = $request->name ;
        $data['email'] = $request->email ;
        $data['password'] = $request->password ;
        $data['password_confirmation'] = $request->password_confirmation ;
         Chauffeur::create($data);
        session()->flash('Succes','Un nouvel hopital ajouté');

        return redirect('/dashboard');
  }

}
