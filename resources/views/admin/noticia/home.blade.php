@extends('adminlte::page')

@section('title', 'Notícias')
    
@section('content_header')
    <h1>Lista das Notícias</h1>
<a href="{{route('noticias.create')}}" class="btn btn-sm btn-success">Adicionar Notícias</a>
@endsection

@section('content')

<div class="card"> 
    <div class="card-body">    
<table class="table table-hover">
   <thead>    
    <tr>
        <th width="400px">Titulo</th>
        <th width="400px">Sub Titulo</th>
        <th width="200px">Autor</th>
        <th width="200px">Categoria</th>
        <th></th>
        <th width="150px">Ações</th>
        @foreach ($noticias as $noticia)
    </tr>
</thead> 
<tbody>

        <tr>
        <td>{{$noticia->title}}</td>
        <td>{{$noticia->subTitulo}}</td>
        <td>{{$noticia->autor}}</td>
        <td>{{$noticia->categoria}}</td>
        <td>
            <td>
            <a href="{{route('noticias.edit', ['noticia' => $noticia->id]) }}"  class="btn btn-sm btn-info">Editar</a>
                    <form class="d-inline" method="POST" action="{{ route('noticias.destroy',['noticia' => $noticia->id]) }}" onsubmit="return confirm('tem certeza que deseja excluir?')" >
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
