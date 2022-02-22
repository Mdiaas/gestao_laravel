<?php
/*
|--------------------------------------------------------------------------
| ContatoController
|--------------------------------------------------------------------------
|
| Desenvolvido por Mateus Dias 07-02-22 para fins de estudo
| 
| 
|
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(){
        return view('site.contato');
    }
}
