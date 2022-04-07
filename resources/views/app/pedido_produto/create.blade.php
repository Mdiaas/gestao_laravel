@extends('app.layouts.basico')

@section('titulo','produtos pedido')
@section('conteudo')
    <div class = "conteudo-pagina">
        <div class = "titulo-pagina-2 ">
            <p>Adicionar produtos</p>
        </div>
        <div class = "menu">
            <ul>
                <li><a href="{{route('cliente.index')}}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class ="informacao-pagina">
                <h4>Detalhes do pedido</h4>
                <p>ID do pedido: {{$pedido->id}}</p>
                <p>ID do cliente: {{$pedido->cliente_id}}</p>
            <div style = "width:30%;margin-left:auto;margin-right:auto;">
                <h4>Itens do pedido</h4>
                @foreach($pedido->produtos as $p)
                    <p>{{$p->nome}}</p>
                @endforeach
                @component('app.pedido_produto._components.form_create',['produtos' => $produtos,'pedido' => $pedido])
                @endcomponent
            </div>
        </div>
    </div>
@endsection