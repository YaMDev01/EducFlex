<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use App\Http\Requests\FormLicenceRequest;
use Carbon\Carbon;

class GestionLicenceController extends Controller
{
    
    public function index()
    {
        return \view('licences.index', [
            'licence' => Licence::first() ?? new Licence()
        ]);
    }

    
    public function create()
    {
        return \view('licences.form', [
            'licence' => new Licence()
        ]);
    }

   
    public function store(FormLicenceRequest $request)
    {
        $data = $request->validated();
        // Generation de code de la licence
        $data['code'] = $this->generer_code_de_licence();
        
        // Generation de la date d'aspiration
        $year = Carbon::now()->format('d/m/Y');
        $explod = explode('/',$year);
        $data['date_aspire'] = $explod[0].'/'.$explod[1].'/'.(int)$explod[2] + (int)$data['duree'];
        
        try{
            Licence::create($data);
        }
        catch(Exception $e){
            return response()->json($e);
        }
        return \to_route('licence.index')->with('success', 'Licence crée avec seccuss');
    }

    
    public function edit(Licence $id)
    {
        return \view('licences.form', [
            'licence' => Licence::first()
        ]);
    }

    public function update(FormLicenceRequest $request, Licence $licence)
    {
        $data = $request->validated();
        
        // Testons l'existence de la variable actif
        $data['actif'] = $data['actif'] ?? '0';

        // Reccuperation de la date de variditer
        $explod = explode('/', $licence->date_aspire);
        $data['date_aspire'] = $explod[0].'/'.$explod[1].'/'.(int)$explod[2] + (int)$data['duree'];
        
        try{
           $licence->update($data);
        }
        catch(Exception $e){
            return response()->json($e);
        }
        return \to_route('licence.index')->with('success', 'Mise à jour effectuée avec success');
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
