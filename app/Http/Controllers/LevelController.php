<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\SchoolYear;

class LevelController extends Controller
{
    
    public function index()
    {
        $levels = Level::orderBy('code','asc')->get();
        $year = SchoolYear::where('actif','1')->first();
        $level = [];
        
        if($year->cycle == '3'){
            $level = $levels;
        }
        if($year->cycle == '2'){
            $level = $levels->where('cycle_id','2');
        }
        if($year->cycle == '1'){
            $level = $levels->where('cycle_id','1');
        }

        return \view('level.index', [
            'level' => $level
        ]);
    }

}
