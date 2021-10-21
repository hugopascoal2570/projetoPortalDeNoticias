
@extends('adminlte::page')

@section('title', 'Categorias')
    
@section('content_header')
    <h1>Lista das Categorias </h1>
<a href="{{route('categorias.create')}}" class="btn btn-sm btn-success">Adicionar Categoria</a>
@endsection

@section('content')

<div class="card"> 
    <div class="card-body">    
<table class="table table-hover">
   <thead>    
    <tr>
        <th width="300px">Nome</th>
        <th width="50px">Cor</th>

        @foreach ($categorias as $categoria)
    </tr>
</thead> 
<tbody>
        <tr>
        <td>{{$categoria->nome}}</td>
        <td><input type="color" name="bgcolor" disabled value="{{$categoria['color']}}" class="form-control" style="width:100px"/></td>
            <td>

            <a href="{{route('categorias.edit', ['categoria' => $categoria->id]) }}" class="btn btn-sm btn-info">Editar</a>
                    <form class="d-inline" method="POST" action="{{ route('categorias.destroy',['categoria' => $categoria->id]) }}" onsubmit="return confirm('tem certeza que deseja excluir?')" >
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
             </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
