<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link href="mainstyle.css" rel="stylesheet">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    </style>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom navbar-light">
        <a class="navbar-brand" href="#" style="margin-left: 1rem;">Taking Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Ayuda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contactanos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">My Notes</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active  my-2 my-lg-0">
                    <a class="nav-link" href="#">Usuario <b>Iniciado</b></a>
                </li>
                <li class="nav-item active  my-2 my-lg-0">
                    <a class="nav-link" href="#">Cerrar sesion</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- container -->
    <div class="container" id="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-12">
                <h2 class="h2-style">Perfil de usuario</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr class="table-style" data-target="#updateusername" data-toggle="modal">
                            <td scope="col">Usuario</td>
                            <td>value</td>
                        </tr>
                        <tr class="table-style" data-target="#updateemail" data-toggle="modal">
                            <td scope="col">Correo</td>
                            <td>value</td>
                        </tr>
                        <tr class="table-style" data-target="#updatepassword" data-toggle="modal">
                            <td scope="col">Contraseña</td>
                            <td>hidden</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <p>Adriana Arguello, c.i:29.509.496 &copy; Copyright 2021</p>
        </div>
    </div>

    <!-- Update username form -->
    <form method="post" id="updateusernameform">
    <div class="modal fade" id="updateusername" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModallabel">Cambiar su nombre de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--login message from php file -->
                <div id="loginmessage"></div>
                <div class="form-group">
                    <label for="loginemail">Nuevo nombre de usuario =</label>
                    <input type="text" class="form-control" id="loginemail" maxlength="50" value="username value">
                </div>
            </div>
            <div class="modal-footer style-buttons">
                    <input class="btn btn-custom2" name="updateusername" type="submit" value="Guardar">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>

    <!-- update email form -->
    <form method="post" id="updateemailform">
    <div class="modal fade" id="updateemail" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModallabel">Cambiar su Correo electronico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--login message from php file -->
                <div id="loginmessage"></div>
                <div class="form-group">
                    <label for="loginemail">Ingrese su nuevo correo =</label>
                    <input type="email" name="email" class="form-control" id="email" maxlength="50" value="email value">
                </div>
            </div>
            <div class="modal-footer style-buttons">
                    <input class="btn btn-custom2" name="updateusername" type="submit" value="Guardar">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
    </form>

    <!-- update password -->
    <form method="post" id="updatepasswordform">
    <div class="modal fade" id="updatepassword" tabindex="-1" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModallabel">Cambiar su contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--login message from php file -->
                <div id="loginmessage"></div>

                <div class="form-group">
                    <label for="currentpassword">Ingrese su contraseña actual =</label>
                    <input type="password" class="form-control" id="currentpassword" name="currentpassword" maxlength="30">
                </div>
                <div class="form-group">
                    <label for="password">Ingrese su nueva contraseña =</label>
                    <input type="password" class="form-control" id="password" name="password" maxlength="30">
                </div>
                <div class="form-group">
                    <label for="password2">Confirme su nueva contraseña =</label>
                    <input type="password" class="form-control" id="password2" name="password2" maxlength="30">
                </div>
            </div>
            <div class="modal-footer style-buttons">
                    <input class="btn btn-custom2" name="updateusername" type="submit" value="Guardar">
                <div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js" integrity="sha512-YHQNqPhxuCY2ddskIbDlZfwY6Vx3L3w9WRbyJCY81xpqLmrM6rL2+LocBgeVHwGY9SXYfQWJ+lcEWx1fKS2s8A==" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>
</html>