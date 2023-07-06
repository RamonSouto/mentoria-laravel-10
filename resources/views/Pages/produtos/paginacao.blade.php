@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div>
        <form action="{{ route('produtos.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button>Pesquisar</button>
            <a type="button" href="" class="btn btn-success float-end">Incluir Produto</a>
        </form>

        <h2>Lista de Produtos</h2>

        <div class="table-responsive small">
            @if ($findProdutos->isEmpty())
                <p>Não existe dados</p>
            @else    
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findProdutos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{'R$ ' . number_format($produto->valor,2, ',','.')}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-light">Editar</a>
                                <a href="{{ route('produtos.delete') }}" class="btn btn-sm btn-danger">Excluir</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection