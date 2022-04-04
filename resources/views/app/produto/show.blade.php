@extends('app.layouts.basico')

@section('titulo','produto')
@section('conteudo')
    <div class = "conteudo-pagina">
        <div class = "titulo-pagina-2 ">
            <p>Visualizar Produto</p>
        </div>
        <div class = "menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class ="informacao-pagina">
            <div style = "width:30%;margin-left:auto;margin-right:auto;">
                <table border=1 style="text-align:left">
                    <tr>
                        <th>Id:</th>
                        <td>{{$produto->id}}</td>
                    </tr>
                    <tr>
                        <th>nome:</th>
                        <td>{{$produto->nome}}</td>
                    </tr>
                    <tr>
                        <th>nome:</th>
                        <td>{{$produto->descricao}}</td>
                    </tr>
                    <tr>
                        <th>peso:</th>
                        <td>{{$produto->peso}}</td>
                    </tr>
                    <tr>
                        <th>unidade_id:</th>
                        <td>{{$produto->unidade_id}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection