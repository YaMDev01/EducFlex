<?php

namespace App\Http\Controllers;

use App\Models\Schooling;
use App\Models\Level;
use App\Http\Requests\FormSchoolingRequest;
use Illuminate\Http\Request;

class SchoolingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('scolarite.index', [
            'scolarite' => Schooling::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('scolarite.form',[
            'scolarite' => new Schooling(),
            'level' => Level::where('actif','1')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormSchoolingRequest $request)
    {
        $data = $request->validated();
        
        Schooling::create($data);

        return \to_route('scolarite.index')->with('success', 'Enregistrement effectué avec success');
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
    public function edit(Schooling $scolarite)
    {
        return \view('scolarite.form',[
            'scolarite' => $scolarite,
            'level' => Level::where('actif','1')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schooling $scolarite)
    {
        $data = $request->validate([
            'level_id' => 'required|integer',
            'mtnt_affecte' => 'required|numeric',
            'mtnt_non_affecte' => 'required|numeric'
        ]);

        $data['actif'] = $request['actif'] ?? '0';

        $scolarite->update($data);
        return \to_route('scolarite.index')->with('success', 'Mise à jour effectué avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schooling $scolarite)
    {
        $scolarite->delete();
        return \to_route('scolarite.index')->with('success', 'Suppression effectuée aec success');
    }
}
