<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Cycle;

class LevelController extends Controller
{
    
    public function index()
    {
        $level = Level::orderBy('code','asc')->get();
        // $cycle = Cycle::where('actif','1')->get();
        // $level = [];
        
        // if(sizeof($cycle) == '2'){
        //     $level = $levels;
        // }
        // if(sizeof($cycle) == '1'){
        //     $level = $levels->where('cycle_id','2');
        // }
        // if(sizeof($cycle) == '1'){
        //     $level = $levels->where('cycle_id','1');
        // }

        return \view('level.index', [
            'level' => $level
        ]);
    }

}
