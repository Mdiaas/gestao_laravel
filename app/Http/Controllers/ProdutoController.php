<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use App\Models\Item;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['produtoDetalhe', 'fornecedor'])->paginate(10);
        // foreach ($produtos as $key => $produto) {
        //     $produto_detalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
        //     if (isset($produto_detalhe)) {
        //         $produtos[$key]['comprimento'] = $produto_detalhe->comprimento;
        //         $produtos[$key]['largura'] = $produto_detalhe->largura;
        //         $produtos[$key]['altura'] = $produto_detalhe->altura;
        //     }
        // }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::All();
        $fornecedores = Fornecedor::All();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'min:2|max:40',
            'descricao' => 'required',
            'peso' => 'required| integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];
        $feedback = [
            'nome.min' => 'Campo nome precisa pelo menos de 2 caracteres',
            'required' => 'O campo :attribute é obrigatório',
            'integer' => 'O campo deve ser um valor inteiro',
            'exists' => 'Campo invalido'
        ];
        $request->validate($regras, $feedback);
        Item::Create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::All();
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'min:2|max:40',
            'descricao' => 'required',
            'peso' => 'required| integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];
        $feedback = [
            'nome.min' => 'Campo nome precisa pelo menos de 2 caracteres',
            'required' => 'O campo :attribute é obrigatório',
            'integer' => 'O campo deve ser um valor inteiro',
            'exists' => 'Campo invalido'
        ];
        $request->validate($regras, $feedback);
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
