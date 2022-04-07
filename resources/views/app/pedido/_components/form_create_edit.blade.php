@if(isset($pedido->id))
    <form method="post" action="{{ route('pedido.update',['pedido'=>$pedido->id])}}">
    @method('PUT')
@else
    <form method="post" action="{{ route('pedido.store')}}">
@endif
    @csrf
    

    <select name = "cliente_id">
        <option>Selecione o cliente</option>
        
        @foreach($clientes as $c)
            <option value = {{$c->id}} {{ ( $pedido->cliente_id ?? old('cliente_id')) == $c->id ? 'selected' : '' }}>{{$c->nome}}</option>
        @endforeach
    </select>

        {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ""}}
    <button class = "borda-preta" type="submit">Cadastrar</button>
</form>