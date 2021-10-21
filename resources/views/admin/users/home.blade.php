@extends('adminlte::page')

@section('title', 'Usuários')
    
@section('content_header')
    <h1>Lista de Usuários</h1>
<a href="{{route('users.create')}}" class="btn btn-sm btn-success">Adicionar Usuário</a>
@endsection

@section('content')

<div class="card"> 
    <div class="card-body">    
<table class="table table-hover">
    <tr>
        <th width="50px">Nome do usuário</th>
        <th width="50px">Email do usuário</th>
        @foreach ($users as $user)
    </tr> 

        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            <a href="{{route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">Editar</a>
                    <form class="d-inline" method="POST" action="{{ route('users.destroy',['user' => $user->id]) }}" onsubmit="return confirm('tem certeza que deseja excluir?')" >
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
             </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
