<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Http\Requests\FormSerieRequest;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('serie.index',[
            'serie' => Serie::where('id','!=','1')->orderBy('libelle', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('serie.form',[
            'serie' => new Serie()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormSerieRequest $request)
    {
        $data = $request->validated();
        $data['seconde'] = $request['seconde'] ?? '0';
        $data['premiere'] = $request['premiere'] ?? '0';
        $data['terminale'] = $request['terminale'] ?? '0';

        Serie::create($data);
        return \to_route('serie.index')->with('success', 'Enregistrement effectué avec success');
    }

    
    public function edit(Serie $serie)
    {
        return \view('serie.form',[
            'serie' => $serie
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serie $serie)
    {
        $data = $request->validate([
            'genre' => 'required|string',
            'libelle' => 'required|max:1',
        ]);
        $data['seconde'] = $request['seconde'] ?? '0';
        $data['premiere'] = $request['premiere'] ?? '0';
        $data['terminale'] = $request['terminale'] ?? '0';
        $data['actif'] = $request['actif'] ?? '0';

        $serie->update($data);
        return \to_route('serie.index')->with('success', 'Suppression effectuée avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie)
    {
        $serie->delete();
        return \to_route('serie.index')->with('success', 'Suppression effectuée avec success');
    }
}
