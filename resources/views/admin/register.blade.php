<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="{{url('assets/login/css/admin.login.css')}}"/>
  </head>
  <body>
        <div class="loginArea">
            <h1>Cadastro</h1>

            @if ($error)
        <div class="error">{{$error}}</div>
            @endif
            <form method="POST">
                @csrf
                <input type="text" name="name" placeholder="Digite Seu nome de Usuário" required/>
                <input type="email" name="email" placeholder="Digite Seu e-mail" required/>
                <input type="password" name="password" placeholder="Digite Sua senha" required/>

                <input type="submit" value="Cadastrar">

                Já possui cadastro:? <a href="{{url('/user/login')}}">Faça login</a>
            </form>
        </div>
  </body>
</html>