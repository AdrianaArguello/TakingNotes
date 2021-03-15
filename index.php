<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <title>Taking Notes</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom navbar-light">
        <a class="navbar-brand" href="#" style="margin-left: 1rem;">Taking Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ayuda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactanos</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active  my-2 my-lg-0">
                    <a class="nav-link" href="#loginmodal" data-toggle="modal">Ingresa</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron" id="myContainer">
        <h1>Online Notes App</h1>
        <p>Tus notas a donde sea que vayas.</p>
        <p>facil de usar, protege todas tus notas.</p>
        <button type="button" class= "btn btn-custom signup" data-toggle="modal" data-target="#signupmodal" data-whatever="@mdo">Ingresa, es gratis.</button>
    </div>
    <div class="footer">
        <div class="container">
            <p>Adriana Arguello, c.i:29.509.496 &copy; Copyright 2021</p>
        </div>
    </div>
    <!-- login form -->
    <form method="post" id="loginForm">
    <div class="modal fade" id="loginmodal" tabindex="-1" aria-labelledby="loginmodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodal">Iniciar sesion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--login message from php file -->
                <div id="loginmessage"></div>
                <div class="form-group">
                    <label for="loginemail">Correo</label>
                    <input type="email" class="form-control" id="loginemail" placeholder="name@example.com" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="loginpassword">Contraseña</label>
                    <input type="password" class="form-control" id="loginpassword" maxlength="20">
                </div>
                <div class="d-flex checkbox justify-content-between">
                    <label for="">
                        <input type="checkbox" name="remenberme" id="remenberme">
                        Recordarme
                    </label>
                    <a class="pull-right" style="cursor:pointer" data-dismiss="modal" data-target="#forgotmodal" data-toggle="modal">¿olvido la contraseña?</a>
                </div>
            </div>
            <div class="modal-footer style">
                <button type="button" class="btn btn-custom2" data-dismiss="modal" data-target="#signupmodal" data-toggle="modal">Registrar</button>
                <div>
                    <input class="btn btn-custom2" name="login" type="submit" value="Ingresar">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>

    <!-- sign up form -->
    <form method="post" id="signupForm">
        <div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupmodal">Crea una cuenta ahora y empieza a utilizar Taking notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--sing up message from php file -->
                    <div id="signupmessage"></div>

                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" id="username" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirmar contraseña</label>
                        <input type="password" class="form-control" name="password2" id="password2" maxlength="50">
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-custom2" name="signup" type="submit" value="registrar">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                </div>
            </div>
        </div>
    </form>

    <!-- forgot password -->
    <form method="post" id="forgotForm">
    <div class="modal fade" id="forgotmodal" tabindex="-1" aria-labelledby="forgotmodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotmodal">¿Olvidaste tu contraseña? Ingresa tu correo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--forgot message from php file -->
                <div id="forgotmessage"></div>
                <div class="form-group">
                    <input type="email" class="form-control" id="forgotemail" placeholder="name@example.com" maxlength="20">
                </div>
            <div class="modal-footer style">
                <button type="button" class="btn btn-custom2" data-dismiss="modal" data-target="#signupmodal" data-toggle="modal">Registrar</button>
                <div>
                    <input class="btn btn-custom2" name="submit" type="submit" value="enviar">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="index.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>
</html>