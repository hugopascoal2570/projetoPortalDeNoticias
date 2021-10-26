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
                        <option value="ts-orange-bg">Laranja</option>
                        <option value="ts-blue-bg" selected>Azul</option>
                        <option value="ts-yellow-bg">Amarelo</option>
                        <option value="ts-green-bg">Verde</option>
                        <option value="ts-purple-bg">Roxo</option>
                        <option value="ts-pink-bg">Rosa</option>
                        <option value="ts-dark-bg">Preto</option>
                        <option value="ts-blue-light-bg">Azul claro</option>
                        <option value="ts-red-bg">Vermelho</option>
                        <option value="ts-brown-bg">Marrom</option>
                        <option value="ts-wine-bg">Vinho</option>
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
