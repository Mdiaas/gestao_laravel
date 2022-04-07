@extends('app.layouts.basico')

@section('titulo','pedido')
@section('conteudo')
    <div class = "conteudo-pagina">
        <div class = "titulo-pagina-2 ">
            <p>Listar pedidos</p>
        </div>
        <div class = "menu">
            <ul>
                <li><a href="{{ route('pedido.create')}}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class ="informacao-pagina">
            <div style = "width:80%;margin-left:auto;margin-right:auto;">
                <table border= "1" style="width:100%; border-spacing:0">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($pedidos as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->cliente_id }}</td>
                            <td><a href = {{ route('pedido-produto.create',['pedido' => $p->id])}}>Adicionar produtos </a></td>
                            <td><a href="{{route('pedido.show',['pedido' => $p->id])}}">Visualizar </a></td>
                            <td>
                                <form id="form_{{$p->id}}" method="post" action="{{route('pedido.destroy',['pedido' => $p->id])}}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$p->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{route('pedido.edit',['pedido' => $p->id])}}">Editar</a></td>
                        </tr>   
                @endforeach
                    </tbody>
                </table>
                {{
                    $pedidos->appends($request)->links()
                }}
                <br/>
                {{$pedidos->total()}} - Total de registros 
            </div>
        </div>
    </div>
@endsection