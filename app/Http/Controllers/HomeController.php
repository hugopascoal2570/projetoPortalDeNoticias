<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $destaques = Noticia::where('destaque', '1')->get();
        $categorias = Categoria::all();
        $agora = Noticia::where('agora','1')->get();
        $esportes = Noticia::where('categoria', 'Esporte')->get();
        $novas = Noticia::where('novas','1')->get();
        $noticias = Noticia::all();
        return view('welcome',[
            'destaques' =>$destaques,
            'categorias' => $categorias,
            'agora' =>$agora,
            'esportes' => $esportes,
            'novas'=>$novas,
            'noticias'=>$noticias
        ]);
    }
    public function view(Request $request, $id){
        
        $noticias = Noticia::where('id', $id)->get();
        $categorias = Categoria::all();
        if ($noticias) {
            return view('single', [
                'noticias' => $noticias,
                'categorias' => $categorias
            ]);
        }
    }
}
