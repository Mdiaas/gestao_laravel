@extends('app.layouts.basico')

@section('titulo','Cliente')
@section('conteudo')
    <div class = "conteudo-pagina">
        <div class = "titulo-pagina-2 ">
            <p>Listar clientes</p>
        </div>
        <div class = "menu">
            <ul>
                <li><a href="{{ route('cliente.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class ="informacao-pagina">
            <div style = "width:80%;margin-left:auto;margin-right:auto;">
                <table border= "1" style="width:100%; border-spacing:0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($clientes as $c)
                        <tr>
                            <td>{{ $c->nome }}</td>
                            <td><a href="{{route('cliente.show',['cliente' => $c->id])}}">Visualizar </a></td>
                            <td>
                                <form id="form_{{$c->id}}" method="post" action="{{route('cliente.destroy',['cliente' => $c->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$c->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route('cliente.edit',['cliente' => $c->id])}}">Editar</a></td>
                        </tr>   
                @endforeach
                    </tbody>
                </table>
                {{
                    $clientes->appends($request)->links()
                }}
                <br/>
                {{$clientes->total()}} - Total de registros 
            </div>
        </div>
    </div>
@endsection