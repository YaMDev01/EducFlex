<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Serie;
use App\Models\Level;
use App\Models\SchoolYear;
use App\Http\Requests\FormClasseRequest;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Classe::get();
            
        return \view('classe.index',[
            'classe' => Classe::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('classe.form',[
            'classe' => new Classe(),
            'level' => Level::where('actif','1')->get(),
            'serie' => Serie::where('actif', '1')->where('id','!=','1')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormClasseRequest $request)
    {
        $data = $request->validated();

        /** @var level_id */
        $level = explode('-',$data['level_id']);
        $data['level_id'] = $level[0];

        /** @var serie_id */
        $serie = $data['serie_id'] ? explode('-',$data['serie_id']):'0';
        $data['serie_id'] = $serie ? $serie[0]:'1';

        /** @var school_year actif */
        $yaer = SchoolYear::where('actif', '1')->first();
        $data['school_year_id'] = $yaer['id'];

        /** @var classe verify */
        $currete_class = Classe::where('school_year_id',$yaer['id'])
        ->where('level_id', $level[0])
        ->where('serie_id', $serie[0] ?? '1')
        ->get();
        $alreadyExist = $currete_class->count();

        if($alreadyExist >= 1){
            $lastClaase = Classe::where('school_year_id',$yaer['id'])
            ->where('level_id', $level[0])
            ->where('serie_id', $serie[0] ?? '1')
            ->latest()->first();
            $data['classe'] = substr($lastClaase->classe,0,-1).($alreadyExist+1);
        }
        else{
            $i = '1';
            $data['classe'] = $serie ? $level[1].ucfirst($serie[1]).$i : $level[1].$i;
        }

        Classe::create($data);
        return \to_route('classe.index')->with('Enregistrement effectué avec success');
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
    public function edit(Classe $classe)
    {
        return \view('classe.form',[
            'classe' => $classe,
            'level' => Level::where('actif','1')->get(),
            'serie' => Serie::where('actif', '1')->where('id','!=','1')->get()
        ]);
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
}
