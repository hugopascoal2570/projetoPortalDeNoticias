<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Noticia;
use App\Models\Categoria;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>[
            'login',
            'loginAction',
            'registerAction',
            'register'
        ]]);
    }
    
    public function index(){
        return view ('admin.home');
    }

    public function login(Request $request){
        return view ('admin.login');
    }
    public function loginAction(Request $request){
        $creds = $request->only('email','password');
        if(Auth::attempt($creds)){
            return redirect('/admin');
        }else{
            $request->session()->flash('error', 'E-mail e/ou senha não conferem');
            return redirect('admin/login');
        } 
    }

    public function register(Request $request){
        return view('admin.register',[
            'error'=> $request->session()->get('error')
        ]);
    }

    public function RegisterAction(Request $request){
        $creds =$request->only('email','password','name');

        $hasEmail = User::where('email', $creds['email'])->count();

        if($hasEmail ===0){
            $newUser = new User();
            $newUser->email = $creds['email'];
            $newUser->name = $creds['name'];
            $newUser->password = password_hash($creds['password'], PASSWORD_DEFAULT);
            $newUser->save();

            Auth::login($newUser);
            return redirect('admin');
        }else{
            $request->session()->flash('error','Já existe um usuário com este e-mail');
            return redirect('admin.register');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/admin');
    }

}
