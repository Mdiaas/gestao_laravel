@if(isset($produto->id))
    <form method="post" action="{{ route('produto.update',['produto'=>$produto->id])}}">
    @method('PUT')
@else
    <form method="post" action="{{ route('produto.store')}}">
@endif
    @csrf
    <input type="text" value ="{{ $produto->nome ?? old('nome')}}" name = "nome" placeholder="Nome" class="borda-preta"/>
    {{$errors->has('nome') ? $errors->first('nome') : ""}}

    <input type="text" value ="{{ $produto->descricao ?? old('descricao')}}" name = "descricao" placeholder="Descrição" class="borda-preta"/>
    {{$errors->has('descricao') ? $errors->first('descricao') : ""}}

    <input type="text" value ="{{ $produto->peso ?? old('peso')}}"  name = "peso" placeholder="Peso" class="borda-preta"/>
    {{$errors->has('peso') ? $errors->first('peso') : ""}}
    <select name = "unidade_id">
        <option>Selecione a unidade de medida</option>
        
        @foreach($unidades as $u)
            <option value = {{$u->id}} {{ ( $produto->unidade_id ?? old('unidade_id')) == $u->id ? 'selected' : '' }}>{{$u->unidade}}</option>
        @endforeach
    </select>
        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ""}}
    <button class = "borda-preta" type="submit">Cadastrar</button>
</form>