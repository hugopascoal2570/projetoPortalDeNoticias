@extends('adminlte::page')

@section('title', 'Editar Matéria')
    
@section('content_header')
    <h1>Editar Matéria</h1>
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <h5><li class="icon fas fa-ban"></li>Ocorreu um erro</h5>

            @foreach ($errors->all() as $error)
    <li>{{$error}}</li> 
            @endforeach
        </ul>
    </div>
@endif
<div class="card"> 
    <div class="card-body">
        <form action="{{route('noticias.update',['noticia'=>$noticia->id])}}" method="POST" class="form-horizontal">
            @method('PUT')
            @csrf 
            <label>Foto de capa</label>
            <img src="{{'/media/capas/' . $noticia->image}}" width="200" height="150px"/>



            <label>Foto de capa Atual</label>
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Titulo da Matéria</label>
                <div class="col-sm-6">
                <input type="text" name="titulo" id="titulo"  value="{{$noticia->title}}" class="form-control @error('titulo') is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-from-label">Sub Título</label>
                <div class="col-sm-6">
                <input type="text" name="sub-titulo" id="sub-titulo" value="{{$noticia->subTitulo}}" class="form-control @error('Sub-Título') is-invalid @enderror">
                </div>
            </div> 
            <br/>
            <label>Só clique abaixo se deseja ativar alguma opção </label><br/>
            <div class="col-sm-6">
                <br/>
                <label>Adicionar a notícia no campo destaque </label>
            <select class="form-control" name="destaque">
                <option value="0">Não</option>
                <option value="1">Sim</option>
              </select>
            </div>
            <br/>
            <div class="col-sm-6">
                <label>Adicionar a notícia no campo News! </label>
            <select class="form-control" name="agora">
                <option value="0">Não</option>
                <option value="1">Sim</option>
              </select>
            </div>
            <br/>
            <div class="col-sm-6">
                <label>Adicionar a notícia no campo Novas! </label>
            <select class="form-control" name="novas">
                <option value="0">Não</option>
                <option value="1">Sim</option>
              </select>
            </div>
            <br/>

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
                <textarea name="body" class="form-control bodyfield">{{$noticia->body}}</textarea>       
                </div>
           
            <div class="form-group row">
                <label class="col-sm-2 col-from-label"></label>
                <input type="submit" value="cadastrar" class="btn btn-success">
            </div>
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