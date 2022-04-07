@extends('app.layouts.basico')

@section('titulo','Fornecedor')
@section('conteudo')
    <div class = "conteudo-pagina">
        <div class = "titulo-pagina-2 ">
            <p>Listar</p>
        </div>
        <div class = "menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>
        <div class ="informacao-pagina">
            <div style = "width:80%;margin-left:auto;margin-right:auto;">
                <table border= "1" style="width:100%; border-spacing:0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($fornecedores as $f)
                        <tr>
                            <td>{{ $f->nome }}</td>
                            <td>{{ $f->site }}</td>
                            <td>{{ $f->uf }}</td>
                            <td>{{ $f->email }}</td>
                            <td><a href="{{ route('app.fornecedor.excluir', $f->id)}}">Excluir</a></td>
                            <td><a href="{{ route('app.fornecedor.editar', $f->id)}}">Editar</a></td>
                        </tr>   
                        <tr>
                            <td colspan=6>
                                <p>Lista de produtos</p>
                                <table border=1 width=100%>
                                    <thead>
                                        <tr>
                                            <th>Nome do produto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($f->produtos as $p)
                                        <tr><td>{{$p->nome}}</td></tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
                {{
                    $fornecedores->appends($request)->links()
                }}
                <br/>
                {{$fornecedores->total()}} - Total de registros 
            </div>
        </div>
    </div>
@endsection