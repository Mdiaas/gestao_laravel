@extends('app.layouts.basico')

@section('titulo','Produto')
@section('conteudo')
    <div class = "conteudo-pagina">
        <div class = "titulo-pagina-2 ">
            <p>Listar</p>
        </div>
        <div class = "menu">
            <ul>
                <li><a href="{{ route('produto.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class ="informacao-pagina">
            <div style = "width:80%;margin-left:auto;margin-right:auto;">
                <table border= "1" style="width:100%; border-spacing:0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($produtos as $p)
                        <tr>
                            <td>{{ $p->nome }}</td>
                            <td>{{ $p->descricao }}</td>
                            <td>{{ $p->fornecedor->nome }}</td>
                            <td>{{ $p->peso }}</td>
                            <td>{{ $p->unidade_id }}</td>
                            <td>{{ $p->produtoDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $p->produtoDetalhe->largura ?? ''}}</td>
                            <td>{{ $p->produtoDetalhe->altura ?? ''}}</td>
                            <td><a href="{{route('produto.show',['produto' => $p->id])}}">Visualizar </a></td>
                            <td>
                                <form id="form_{{$p->id}}" method="post" action="{{route('produto.destroy',['produto' => $p->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$p->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route('produto.edit',['produto' => $p->id])}}">Editar</a></td>
                        </tr>   
                @endforeach
                    </tbody>
                </table>
                {{
                    $produtos->appends($request)->links()
                }}
                <br/>
                {{$produtos->total()}} - Total de registros 
            </div>
        </div>
    </div>
@endsection