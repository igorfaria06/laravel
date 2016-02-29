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
                <h1 class="login-heading">
                    <h1 class="login-heading"><p><strong>Bem Vindo!</strong></p></h1>
                <h4 class="login-heading login-heading-2"><p>Faca login, por favor.</p></h4>
                <form method="POST" action="/auth/login">
                    {!! csrf_field() !!}
                    <input type="email" name="email" placeholder="Username" value="{{ old('email') }}" class="input-txt" />
                    <input type="password" name="password" placeholder="Password" class="input-txt" />
                    <input type="checkbox" name="remember"> Lembrar
                        
                    <div class="login-footer">
                        <a href="/auth/register"><button type="button" class="btn btn--left">Se Registrar</button></a>
                        <button type="submit" class="btn btn--right">Logar</button>

                    </div>
                </form>
            </div>
        </div>

        <script src="{{url()}}/assets/login/js/index.js"></script>
    </body>
</html>

<!--<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>-->