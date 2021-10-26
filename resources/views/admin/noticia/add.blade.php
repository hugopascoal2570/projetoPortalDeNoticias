@extends('adminlte::page')

@section('title', 'Nova Matéria')
    
@section('content_header')
    <h1>Nova Matéria</h1>

@endsection

@section('content')


<div class="card"> 

    <div class="card-body">
        <form action="{{route('noticias.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <label>Foto de capa</label>
            <input type="file" id="image" name="image" required class="from-control-file">

            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Titulo da Matéria</label>
                <div class="col-sm-6">
                <input type="text" name="titulo" id="titulo"  required class="form-control @error('titulo') is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Sub Título</label>
                <div class="col-sm-6">
                <input type="text" name="sub-titulo" id="sub-titulo"  required class="form-control @error('Sub-Título') is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Autor</label>
                <div class="col-sm-6">
                    <select class="form-control" name="autor">
                        @foreach ($usuarios as $usuario)
                        <option>{{$usuario->name}}</option>
                        @endforeach
                      </select>
                </div>
            </div>
            
            <label>Só clique abaixo se deseja ativar alguma opção </label><br/>
            <div class="col-sm-6">
                <label>Adicionar a notícia no campo destaque </label>
            <select class="form-control" name="destaque">
                <option value="0">Não</option>
                <option value="1">Sim</option>
              </select>
            </div>
            <div class="col-sm-6">
                <label>Adicionar a notícia no campo News! </label>
            <select class="form-control" name="agora">
                <option value="0">Não</option>
                <option value="1">Sim</option>
              </select>
            </div>
            <div class="col-sm-6">
                <label>Adicionar a notícia no campo Novas! </label>
            <select class="form-control" name="novas">
                <option value="0">Não</option>
                <option value="1">Sim</option>
              </select>
            </div>
 
        <div class="row">
            <div class="col-sm-6">
              <!-- select -->
              <div class="form-group">
                <label>Selecione a categoria da Matéria</label>
                <select class="form-control" name="categoria">
                @foreach ($categorias as $categoria)
                  <option value="{{$categoria->nome}}">{{$categoria->nome}}</option>
                @endforeach
            </select>
              </div>
            </div>
        </div> 
            <div class="form-group row"><br/>
                <label class="col-sm-2 col-from-label">Corpo da Notícia</label>
            </div>
                <div class="col-sm-8">
                <textarea name="body" class="form-control bodyfield"></textarea>       
                </div>
           
            <div class="form-group row">
                <label class="col-sm-2 col-from-label"></label>
                <input type="submit" value="cadastrar" class="btn btn-success">
            </div>
        </form>
    </div>
    </div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=eijpmc7sdy2yipxuifg9fvebqq3l49ius24593k4ou1i4f0d"></script>
<script>
    tinymce.init({
        selector:'textarea.bodyfield',
        height:300,
        menubar:false,
        plugins:['link','table','image','autoresize','lists'],
        toolbar:'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | table| link | image | Abullist numlist | removeformat',
        content_css:[
            '{{asset('assets\css\content.css')}}'
        ],
        images_upload_url:'{{route('imageupload')}}',
        images_upload_credentials:true
    });
</script>

@endsection