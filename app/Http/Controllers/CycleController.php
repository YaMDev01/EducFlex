<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    
    public function index()
    {
        return \view('cycle.index', [
            'cycle' => Cycle::get()
        ]);
    }

    public function update(Request $request, Cycle $cycle)
    {
        if($cycle->actif == '1'){
            $data['actif'] = '0';
            $cycle->update($data);
            $status = 'success';
            $msg = 'Le'.$cycle->libelle.' vient d\'être désactivé';
        }
        else{
            $data['actif'] = '1';
            $cycle->update($data);
            $status = 'success';
            $msg = 'Le'.$cycle->libelle.' vient d\'être activé';
        }
        return \to_route('cycle.index')->with($status, $msg);
    }

}
