<?php

namespace App\Http\Controllers;

use App\Models\Coefficient;
use App\Http\Requests\FormCoefficientRequest;
use Illuminate\Http\Request;

class CoefficientController extends Controller
{
    
    public function index()
    {
        return \view('coefficient.index', [
            'coefficient' => Coefficient::orderBy('valeur', 'asc')->get()
        ]);
    }

    
    public function create()
    {
        return \view('coefficient.form', [
            'coefficient' => new Coefficient()
        ]);
    }

    
    public function store(FormCoefficientRequest $request)
    {
        $data = $request->validated();

        Coefficient::create($data);

        return \to_route('coefficient.index')->with('success', 'Enregistrement effectué avec success');
    }

    
    public function edit(Coefficient $coefficient)
    {
        return \view('coefficient.form', [
            'coefficient' => $coefficient
        ]);
    }

    
    public function update(Request $request, Coefficient $coefficient)
    {
       $data = $request->validate(['valeur' => 'required|integer']);
       $data['actif'] = $request['actif'] ?? '0';

       $coefficient->update($data);
       return \to_route('coefficient.index')->with('success', 'Mise à jour effectué avec success');
    }

    
    public function destroy(Coefficient $coefficient)
    {
        $coefficient->delete();
        return \to_route('coefficient.index')->with('success', 'Suppression effectué avec success');
    }
}
