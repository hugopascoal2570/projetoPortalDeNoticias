<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Noticia;
use App\Models\User;
use Psy\CodeCleaner\IssetPass;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        $noticias = Noticia::paginate(20);
        $categorias = Categoria::all();
        return view('admin.noticia.home', [
            'noticias' => $noticias,
            'usuarios' => $usuarios

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        $categorias = Categoria::all();
        return view('admin.noticia.add', [
            'categorias' => $categorias,
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->only([
            'titulo',
            'sub-titulo',
            'autor',
            'image',
            'categoria',
            'body',
            'destaque',
            'agora',
            'novas'
        ]);
        if ($data['destaque'] == '') {
            $data['destaque'] = '0';
        }
        if ($data['agora'] == '') {
            $data['agora'] = '0';
        }
        if ($data['novas'] == '') {
            $data['novas'] = '0';
        }

        $data['slug'] = Str::slug($data['titulo'], '-');
        $validator = Validator::make($data, [
            'titulo' => ['required', 'string', 'max:255'],
            'sub-titulo' => ['required', 'string', 'max:255'],
            'autor' => ['required', 'string', 'max:255'],
            'categoria' => ['required', 'string', 'max:255'],
            'body' => ['string'],
            'slug' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->route('noticias.create')
                ->withErrors($validator)
                ->withInput();
        }
        /*
        if($request->file('image')->isValid()) {
            $imagem = $request->file('image')->store('media/capas');
               }
               */



        $noticias = new Noticia();
        $noticias->title = $data['titulo'];

        $noticias->subTitulo = $data['sub-titulo'];
        $noticias->autor = $data['autor'];
        $noticias->categoria = $data['categoria'];
        $noticias->slug = $data['slug'];
        $noticias->body = $data['body'];
        $noticias->destaque = $data['destaque'];
        $noticias->agora = $data['agora'];
        $noticias->novas = $data['novas'];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('media/capas'), $imageName);
            $noticias->image = $imageName;
        }

        $noticias->save();

        return redirect()->route('noticias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $noticia = Noticia::find($id);
        $categorias = Categoria::all();
        if ($noticia) {
            return view('admin.noticia.edit', [
                'noticia' => $noticia,
                'categorias' => $categorias
            ]);
        }
        return redirect()->route('noticia.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $noticia = Noticia::find($id);

        if ($noticia) {

            $data = $request->only([
                'titulo',
                'sub-titulo',
                'body',
                'image',
                'categoria',
                'destaque',
                'agora',
                'novas'
            ]);
            $data['slug'] = Str::slug($data['titulo'], '-');
            $validator = Validator::make($data, [
                'titulo' => ['required', 'string', 'max:255'],
                'sub-titulo' => ['required', 'string', 'max:255'],
                'body' => ['string'],
                'slug' => ['required', 'string', 'max:255'],
            ]);
            if ($validator->fails()) {

                return redirect()->route('noticias.edit', [
                    'noticia' => $id
                ])
                    ->withErrors($validator)
                    ->withInput();
            }

            $noticia->title = $data['titulo'];
            $noticia->subTitulo = $data['sub-titulo'];
            $noticia->categoria = $data['categoria'];
            $noticia->slug = $data['slug'];
            $noticia->body = $data['body'];
            $noticia->destaque = $data['destaque'];
            $noticia->agora = $data['agora'];
            $noticia->novas = $data['novas'];

            $noticia->save();

            return redirect()->route('noticias.index');
        }
    }

    public function destroy($id)
    {

        $page = Noticia::find($id);
        $page->delete();

        return redirect()->route('noticias.index');
    }
}
