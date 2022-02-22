<h3> Fornecedor </h3>


@forelse($fornecedores as $indice => $fornecedor)
    Nome: {{$fornecedor['nome']}}
    <br/>
    Status: {{$fornecedor['status']}}
    <br/><hr/>

    @empty
        nada existente
@endforelse