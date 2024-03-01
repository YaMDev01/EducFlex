<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionLicenceController extends Controller
{
    
    public function index()
    {
        return \view('licences.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('licences.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $code_licence = $this->generer_code_de_licence();
        dd($code_licence);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(string $id)
    {
        //
    }

    static function generer_code_de_licence($length = 3,  $occurence = 4) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $final_string = "";

        for ($i = 0; $i < $occurence; $i++) {
            $randomString = '';
            for ($j = 0; $j < $length; $j++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $final_string .= $randomString;
            if( $i < $occurence-1 ){
                $final_string .= '-';
            }
        }
        return $final_string;
    }
}
