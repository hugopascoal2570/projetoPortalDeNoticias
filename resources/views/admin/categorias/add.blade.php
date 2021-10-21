@extends('adminlte::page')

@section('title', 'Nova Categoria')
    
@section('content_header')
    <h1>Nova Categoria</h1>

@endsection

@section('content')


<div class="card"> 

    <div class="card-body">
        <form action="{{route('categorias.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Nome da Categoria</label>
                <div class="col-sm-6">
                <input type="text" name="nome" id="nome" value="nome" class="form-control @error('nome') is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Cor da categoria</label>
                <div class="col-sm-10">
                    <select name="color">
                        <option value="#ff6e0d">Laranja</option>
                        <option value="#007dff" selected>Azul</option>
                        <option value="#ffaf31">Amarelo</option>
                        <option value="#4ab106">Verde</option>
                        <option value="#6200ee">Roxo</option>
                        <option value="#ff5575">Rosa</option>
                        <option value="#020202">Preto</option>
                        <option value="#007dff">Azul claro</option>
                        <option value="#ff0000">Vermelho</option>
                        <option value="#FF5733">Marrom</option>
                        <option value="#722F37">Vinho</option>
                      </select>
                </div>
            </div>
            <div class="form-group row">
                        <label class="col-sm-2 col-from-label"></label>
                    <div class="col-sm-6">
                        <input type="submit" value="cadastrar" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
</form>

@endsection
