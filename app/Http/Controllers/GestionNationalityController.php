<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use App\Http\Requests\FormNationalityRequest;
use Illuminate\Http\Request;

class GestionNationalityController extends Controller
{
    
    public function index()
    {
        return \view('nationalite.index',[
            'nationalite' => Nationality::orderBy('libelle', 'asc')->get()
        ]);
    }

    
    public function create()
    {
        return \view('nationalite.form', [
            'nationalite' => new Nationality()
        ]);
    }

    
    public function store(FormNationalityRequest $request)
    {
        try{
            Nationality::create($request->validated());
        }
        catch(Exception $e){
            return response()->json($e);
        }
        return \to_route('nationalite.index')->with('success', 'Enregistrement effectué avec success');
    }

    
    
    public function edit(Nationality $nationalite)
    {
        return \view('nationalite.form', [
            'nationalite' => $nationalite
        ]);
    }

    
    public function update(Request $request, Nationality $nationalite)
    {
        $data = $request->validate(['libelle' => 'required']);
        $data['actif'] = $request['actif'] ?? '0';

        try{
            $nationalite->update($data);
        }
        catch(Exception $e){
            return response()->json($e);
        }
        return \to_route('nationalite.index')->with('success', 'Mise à jour effectué avec success');
    }

    
    public function destroy(Nationality $nationalite)
    {
        $nationalite->delete();
        return \to_route('nationalite.index')->with('success', 'Suppression effectuée avec success');
    }
}
