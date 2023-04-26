<?php

namespace App\Http\Controllers;

use App\Models\Hopital;
use Illuminate\Http\Request;

class HopitalControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function CreateHopital(Request $request)
    {
        $data= $request->all();
        Hopital::create($data);
        return redirect('/ListesHopitals');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function GetListes()
    {
        $hopitals = Hopital::latest()->paginate(4);
       return view('ListesHopitals', compact('hopitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy2(string $id)
    {
        //
    }
}
