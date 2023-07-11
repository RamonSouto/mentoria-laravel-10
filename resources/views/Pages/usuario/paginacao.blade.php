@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuário</h1>
    </div>
    <div>
        <form action="{{ route('usuario.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button>Pesquisar</button>
            <a type="button" href="{{ route('cadastrar.usuario')}}" class="btn btn-success float-end">Incluir Usuário</a>
        </form>

        <h2>Lista de Usuários</h2>

        <div class="table-responsive small">
            @if ($findUsuarios->isEmpty())
                <p>Não existe dados</p>
            @else    
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findUsuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <a href="{{ route('atualizar.usuario', $usuario->id) }}" class="btn btn-sm btn-light">Editar</a>
                                <meta name="csrf_token" content="{{ csrf_token() }}">
                                <a onclick="deleteRegistroPaginacao('{{ route('usuario.delete') }}', {{ $usuario->id}} )" class="btn btn-sm btn-danger">Excluir</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection