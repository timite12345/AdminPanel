<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Hopital;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class FacturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factures = Facture::latest()->paginate(4);
        $missions = Mission::latest()->paginate(4);
        $hopitals = Hopital::all();
     return view('ListesFacture', compact('factures','missions','hopitals'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  public function getFacturePdf (Facture $factures)
{
   $hopitals = Hopital::all();
    $fac=Facture::all()->count();
    $da = \Carbon\Carbon::now()->format('d-m-Y'); //permet de modifier le format de la date
    $date = \Carbon\Carbon::now()->format('d-m-Y');
    $pdf = PDF::loadView('PdfFacture', compact('factures'));
    $pdf->stream(); //la méthode stream() pour afficher le fichier PDF dans un navigateur :
    return view('PdfFacture',compact(
        '$hopitals',
        '$da',
        '$date',
        'pdf'

));
}

    /**
     * Display the specified resource.
     */
    public function show1(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroye1($factures)
    {
          Facture::findOrFail($factures)->delete();
        return back()->with('message'," Facture supprimé avec succès");
    }
}
