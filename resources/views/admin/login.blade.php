<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="{{url('assets/login/css/admin.login.css')}}"/>
  </head>
  <body>
        <div class="loginArea">
            <h1>Login</h1>
            <form method="POST">
                @csrf
                <input type="email" name="email" placeholder="Digite Seu e-mail" required/>
                <input type="password" name="password" placeholder="Digite Sua senha" required/>
                <input type="submit" value="Entrar">
                <!--Ainda não tem cadastro? <a href="{{url('/admin/register')}}">Cadastre-se</a>-->
            </form>
        </div>
  </body>
</html>