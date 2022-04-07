@if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update',['cliente'=>$cliente->id])}}">
    @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store')}}">
@endif
    @csrf
    

    <input type="text" value ="{{ $cliente->nome ?? old('nome')}}" name = "nome" placeholder="Nome" class="borda-preta"/>
    {{$errors->has('nome') ? $errors->first('nome') : ""}}

        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ""}}
    <button class = "borda-preta" type="submit">Cadastrar</button>
</form>