@if(isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update',['produto_detalhe'=>$produto_detalhe->id])}}">
    @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store')}}">
@endif
    @csrf
    <input type="text" value ="{{ $produto_detalhe->produto_id ?? old('produto_id')}}" name = "produto_id" placeholder="produto_id" class="borda-preta"/>
    {{$errors->has('produto_id') ? $errors->first('produto_id') : ""}}

    <input type="text" value ="{{ $produto_detalhe->comprimento ?? old('comprimento')}}" name = "comprimento" placeholder="comprimento" class="borda-preta"/>
    {{$errors->has('comprimento') ? $errors->first('comprimento') : ""}}

    <input type="text" value ="{{ $produto_detalhe->largura ?? old('largura')}}"  name = "largura" placeholder="largura" class="borda-preta"/>
    {{$errors->has('largura') ? $errors->first('largura') : ""}}

    <input type="text" value ="{{ $produto_detalhe->altura ?? old('altura')}}"  name = "altura" placeholder="altura" class="borda-preta"/>
    {{$errors->has('altura') ? $errors->first('altura') : ""}}

    <select name = "unidade_id">
        <option>Selecione a unidade de medida</option>
        
        @foreach($unidades as $u)
            <option value = {{$u->id}} {{ ( $produto_detalhe->unidade_id ?? old('unidade_id')) == $u->id ? 'selected' : '' }}>{{$u->unidade}}</option>
        @endforeach
    </select>
        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ""}}
    <button class = "borda-preta" type="submit">Cadastrar</button>
</form>