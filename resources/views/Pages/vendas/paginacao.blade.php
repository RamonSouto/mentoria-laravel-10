@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>
    <div>
        <form action="{{ route('vendas.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button>Pesquisar</button>
            <a type="button" href="{{ route('cadastrar.venda')}}" class="btn btn-success float-end">Incluir Venda</a>
        </form>

        <h2>Lista de Clientes</h2>

        <div class="table-responsive small">
            @if ($findVendas->isEmpty())
                <p>Não existe dados</p>
            @else    
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Número da venda</th>
                            <th>Cliente</th>
                            <th>Produto</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findVendas as $venda)
                        <tr>
                            <td>{{$venda->numero_da_venda}}</td>
                            <td>{{$venda->cliente->nome}}</td>
                            <td>{{$venda->produto->nome}}</td>
                            <td>{{'R$ ' . number_format($venda->produto->valor,2, ',','.')}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-light">Enviar E-mail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection