<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.home',[
            'categorias' =>$categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->only([
            'nome',
            'color'
        ]);

        if($data['color'] == 'ts-green-bg'){
            $data['hexadecimal'] = '#4ab106';
        }
        if($data['color'] == 'ts-blue-bg'){
            $data['hexadecimal'] = '#007dff';
        }
        if($data['color'] == 'ts-dark-bg'){
            $data['hexadecimal'] = '#020202';
        }
        if($data['color'] == 'ts-blue-light-bg'){
            $data['hexadecimal'] = '#007dff';
        }
        if($data['color'] == 'ts-pink-bg'){
            $data['hexadecimal'] = '#ff5575';
        }
        if($data['color'] == 'ts-yellow-bg'){
            $data['hexadecimal'] = '#ffaf31';
        }
        if($data['color'] == 'ts-orange-bg'){
            $data['hexadecimal'] = '#ff6e0d';
        }
        if($data['color'] == 'ts-purple-bg'){
            $data['hexadecimal'] = '#6200ee';
        }
        if($data['color'] == 'ts-white-bg'){
            $data['hexadecimal'] = '#ffffff';
        }
        if($data['color'] == 'ts-red-bg'){
            $data['hexadecimal'] = '#ff0000';
        }
        if($data['color'] == 'ts-brown-bg'){
            $data['hexadecimal'] = '#FF5733';
        }
        if($data['color'] == 'ts-wine-bg'){
            $data['hexadecimal'] = ' #722F37';
        }
        if($data['color'] == 'ts-blue-light-heighlight'){
            $data['hexadecimal'] = '#007dff';
        }


        $validator = Validator::make($data,[
            'nome' => ['required', 'string','max:255'],
            'color' => ['required', 'string','max:255'],
            'hexadecimal' => ['required', 'string','max:255']
        ]);
        if($validator->fails()){
            return redirect()->route('categorias.create')
            ->withErrors($validator)
            ->withInput();
        }

        $categorias = New Categoria();
        $categorias->nome = $data['nome'];
        $categorias->color = $data['color'];
        $categorias->hexadecimal = $data['hexadecimal'];
        $categorias->save();

        return redirect()->route('categorias.index');
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
    public function edit($id){
        $categoria = Categoria::find($id);

        if($categoria){
            return view('admin.categorias.edit',[
                'categoria' => $categoria
            ]);
        }
       return redirect()->route('categorias.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $categoria = Categoria::find($id);

        if($categoria){
 
         $data  = $request->only([
            'name',
            'color'
         ]);
                $validator = Validator::make($data,[
                    'name' => ['required','string','max:100'],
                    'color' =>  ['required','string'],
    
                ]);
            }
            if($validator->fails()){

                return redirect()->route('categorias.edit',[
                    'categoria' => $id
                ])
                ->withErrors($validator)
                ->withInput();
                }
 
                $categoria->nome = $data['name'];
                $categoria ->color = $data['color'];

         $categoria->save();
 
      return redirect()->route('categorias.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
