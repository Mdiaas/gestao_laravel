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
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(Request $request){
        $request->validate([
            'nome' => 'required|min:3|max:40', //obrigatorio, minimo 3 caracteres e maximo 40 caracteres
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
            'telefone' => 'required'
        ],[
            'min' => 'Necessário preencher pelo menos 3 caracteres',
            'nome.max' => 'Campo nome deve ter no máximo 40 caracteres',
            'mensagem.max' => 'Campo nome deve ter no máximo 2000 caracteres',
            'email.email' => 'Email inválido',
            'required' => 'O campo :attribute precisa ser preenchido'
        ]
    );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
