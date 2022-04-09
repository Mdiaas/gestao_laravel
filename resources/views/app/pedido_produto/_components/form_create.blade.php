
    <form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido])}}">
    @csrf
    <select name = "produto_id">
        <option>Selecione o produto</option>
        
        @foreach($produtos as $p)
            <option value = {{$p->id}} {{ ( $pedido->produto_id ?? old('produto_id')) == $p->id ? 'selected' : '' }}>{{$p->nome}}</option>
        @endforeach
    </select>
    {{$errors->has('produto_id') ? $errors->first('produto_id') : ""}}
    <input type = 'number' name="quantidade" value = "{{ old("quantidade") ?? old("quantidade")}}" placeholder="Quantidade" class = "borda-preta"/>
    {{$errors->has('quantidade') ? $errors->first('quantidade') : ""}}
    <button class = "borda-preta" type="submit">Cadastrar</button>
</form>