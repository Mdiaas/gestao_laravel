<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'F1',
                'status' => 'N',
                'cnpj' => 'aaaaa',
                'ddd' => '15',
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'F2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'F3',
                'status' => 'S',
                'cnpj' => 'ABV',
                'ddd' => '32',
                'telefone' => '0000-0000'
            ]
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
