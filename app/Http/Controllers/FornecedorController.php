<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome','like','%'.$request->input('nome').'%')
        ->where('site','like','%'.$request->input('site').'%')
        ->where('uf','like','%'.$request->input('uf').'%')
        ->where('email','like','%'.$request->input('email').'%')
        ->paginate(2);

        
        return view('app.fornecedor.listar',['fornecedores'=> $fornecedores, 'request' => $request->all()]);
    }
    public function adicionar(Request $request){
        $msg = "";
        $regras =[
            'nome' => 'required|min:3|max:40',
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'email'
        ];
        $feedback = [
            'required' => "O campo :attribute é obrigatório",
            'nome.min' => "O campo nome precisa ter no minimo 3 caracteres",
            'nome.max' => "O campo nome precisa ter no máximo 40 caracteres",
            'uf.min' => "O campo uf precisa ter no minimo 2 caracteres",
            'uf.max' => "O campo uf precisa ter no máximo 2 caracteres",
            'email' => 'Email não foi preenchido corretamente'
        ];

        $request->validate($regras, $feedback);
        if($request->input('_token') != '' && $request->input('id') == ''){
            
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            $msg = "Cadastro realizado com sucesso";
        }else if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor =  Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update){
                $msg = "Atualização realizada com sucesso";
            }else{
                $msg = "Erro ao atualizar fornecedor";
            }
            return redirect()->route('app.fornecedor.editar', ['id'=>$request->input('id'),'msg'=>$msg]);
        }
        return view('app.fornecedor.adicionar', ["msg" => $msg]);
    }
    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar',['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
    public function excluir($id){
        $fornecedor = Fornecedor::find($id)->delete();
        
        return redirect()->route('app.fornecedor');
    }
}
