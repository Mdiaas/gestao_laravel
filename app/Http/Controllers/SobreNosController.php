<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| SobreNosController
|--------------------------------------------------------------------------
|
| Desenvolvido por Mateus Dias 07-02-22 para fins de estudo
| 
| 
|
*/
class SobreNosController extends Controller
{
    
    public function sobreNos(){
        return view('site.sobre-nos');
    }
}
