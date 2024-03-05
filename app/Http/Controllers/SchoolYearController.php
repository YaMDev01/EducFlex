<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Http\Requests\FormSchoolYearRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SchoolYearController extends Controller
{

    public function index()
    {
        return \view('school_year.index',[
            'school_year' => SchoolYear::orderBy('actif', 'desc')->get()
        ]);
    }

    
    public function create()
    {
        return \view('school_year.form', [
            'school_year' => new SchoolYear()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormSchoolYearRequest $request)
    {
        $data = $request->validated();

        if($request['cycle1'] && $request['cycle2']  ){ $data['cycle'] = '3'; }
        elseif($request['cycle2']){ $data['cycle'] = '2'; }
        elseif($request['cycle1']){ $data['cycle'] = '1'; }
        
        $data['actif'] = $request['actif'] ?? '0';

        /**  @var current_year avec la librairie Carbon  */
        $currentYear = Carbon::now()->format('Y');
        // $currentYear =  '2022';
        $check = SchoolYear::where('current_year', $currentYear)->get();
        $alreadyExist = $check->count();

        if($alreadyExist >= 1){
            $statut = 'error';
            $message = 'L\'année en cours à déjà été ajouté.';
        }
        else{
        $data['current_year'] = $currentYear;
        
        if($data['actif'] && $data['actif'] == 1){
            SchoolYear::where('actif', '1')->update(['actif' => '0']);
            SchoolYear::create($data);
        }
        else{
            SchoolYear::create($data);
        }
        $statut = 'success';
        $message = 'Enrégistrement effectué avec succes.';
        }
        return \to_route('school_year.index')->with($statut, $message);
    }



    public function edit(SchoolYear $school_year)
    {
        return \view('school_year.form', [
            'school_year' => $school_year
        ]);
    }


    public function update(Request $request, SchoolYear $school_year)
    {
        $data = $request->validate([
            'school_year' => 'required|string',
            'session' => 'required|integer|min:1',
            'cycle1' => 'nullable|integer',
            'cycle2' => 'nullable|integer',
            'actif' => 'nullable|integer'
        ]);
        
        if($request['cycle1'] && $request['cycle2']  ){ $data['cycle'] = '3'; }
        elseif($request['cycle2']){ $data['cycle'] = '2'; }
        elseif($request['cycle1']){ $data['cycle'] = '1'; }
        
        $data['actif'] = $request['actif'] ?? '0';
        // dd($data);
        if($data['actif'] && $data['actif'] == 1){
            SchoolYear::where('actif', '1')->update(['actif' => '0']);
            $school_year->update($data);
        }
        else{
            $school_year->update($data);
        }
        return \to_route('school_year.index')->with('success', 'Mise à jour effectuée avec success');
    }

    
    public function destroy(SchoolYear $school_year)
    {
        $school_year->delete();
        return \to_route('school_year.index')->with('success', 'Suppression effectuée avec success');
    }
}
