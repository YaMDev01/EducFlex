<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $code_licence = $this->generer_code_de_licence();
        dd($code_licence);

        return view('dashboard');
    }



    static function generer_code_de_licence($length = 3,  $occurence = 4) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $final_string = "";

        for ($i = 0; $i < $occurence; $i++) {
            $randomString = '';
            for ($j = 0; $j < $length; $j++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $final_string .= $randomString;
            if( $i < $occurence-1 ){
                $final_string .= '-';
            }
        }
        return $final_string;
    }
}
