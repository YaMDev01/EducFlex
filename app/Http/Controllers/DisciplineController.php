<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Http\Requests\FormMatiereRequest;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    
    public function index()
    {
        return \view('matiere.index', [
            'matiere' => Discipline::orderBy('libelle', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('matiere.form', [
            'matiere' => new Discipline()
        ]);
    }

    
    public function store(FormMatiereRequest $request)
    {
        $data = $request->validated();
        if($request['cycle1'] && $request['cycle2']  ){ $data['cycle'] = '3'; }
        elseif($request['cycle2']){ $data['cycle'] = '2'; }
        elseif($request['cycle1']){ $data['cycle'] = '1'; }

        Discipline::create($data);
        return \to_route('matiere.index')->with('success', 'Enregistrement effectué avec success');

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
    public function edit(Discipline $matiere)
    {
        return \view('matiere.form', [
            'matiere' => $matiere
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discipline $matiere)
    {
        $data = $request->validate([
            'libelle' => 'required|string',
            'abrege' => 'nullable|string',
            'cycle1' => 'nullable|integer',
            'cycle2' => 'nullable|integer'
        ]);
        
        $data['actif'] = $request['actif'] ?? '0';
        if($request['cycle1'] && $request['cycle2']  ){ $data['cycle'] = '3'; }
        elseif($request['cycle2']){ $data['cycle'] = '2'; }
        elseif($request['cycle1']){ $data['cycle'] = '1'; }

        $matiere->update($data);
        return \to_route('matiere.index')->with('success', 'Mise à jour effectué avec success');
    }


    public function destroy(Discipline $matiere)
    {
        $matiere->delete();
        return \to_route('matiere.index')->with('success', 'Suppression effectué avec success');
    }
}
