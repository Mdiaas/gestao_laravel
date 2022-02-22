<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1,int $p2){
        //enviar parametros para view com array associativo
        // return view('site.teste',['p1' => $p1, 'p2' => $p2]);

        //enviar parametros para view com compact
        // return view('site.teste', compact('p1', 'p2'));

        //enviar parametros para view com método with()
        return view('site.teste')->with('p1', $p1)->with('p2',$p2);
    }
}
