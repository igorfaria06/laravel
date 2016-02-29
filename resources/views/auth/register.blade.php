<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Simple login form</title>    
        <link rel="stylesheet" href="{{url()}}/assets/login/css/reset.css">
        <link rel="stylesheet" href="{{url()}}/assets/login/css/style.css">
    </head>
    <body>

        <div class="container">
            <div class="login" >
                <h1 class="login-heading"><p><strong>Olá!</strong></p></h1>
                <h4 class="login-heading login-heading-2"><p>Preencha o formulário para se registrar.</p></h4>
                <form method="POST" action="/auth/register"">
                    {!! csrf_field() !!}
                    <input type="text" name="nome" placeholder="Nome" class="input-txt" />
                    <input type="text" name="sexo" placeholder="Sexo" class="input-txt" />
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="input-txt" />
                    <input type="password" name="password" placeholder="Senha" class="input-txt" />
                    <input type="password" name="password_confirmation" placeholder="Confime sua senha" class="input-txt">
                    <div class="login-footer">
                        <a href="/auth/login"><button type="button" class="btn btn--left">Voltar</button></a>
                        <button type="submit" class="btn btn--right">Registar</button>

                    </div>
                </form>
            </div>
        </div>

        <script src="{{url()}}/assets/login/js/index.js"></script>
    </body>
</html>

<!--<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div>
        Name
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>-->