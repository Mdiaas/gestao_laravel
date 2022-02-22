<?php

namespace App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| PrincipalController
|--------------------------------------------------------------------------
|
| Desenvolvido por Mateus Dias 07-02-22 para fins de estudo
| 
| 
|
*/
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        return view('site.principal');
    }
}
