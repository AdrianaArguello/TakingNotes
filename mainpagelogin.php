
<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: index.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Notes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link href="mainstyle.css" rel="stylesheet">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>
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
                <!-- <li class="nav-item"><a class="nav-link" href="#">Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ayuda</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contactanos</a></li> -->
                <li class="nav-item active"><a class="nav-link" href="mainpagelogin.php">Notas</a></li>
                <li class="nav-item"><a class="nav-link" href="mainpagedirectory.php">Directorios</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item my-2 my-lg-0">
                    <a class="nav-link" href="#"><?php echo $_SESSION['email']?></a>
                </li>
                <li class="nav-item my-2 my-lg-0">
                    <a class="nav-link" href="index.php?logout=1">Cerrar sesion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" id="container">
        <!--Alert Message-->
        <div id="alert" class="alert alert-danger collapse">
            <a class="close" data-dismiss="alert">&times;</a>
            <p id="alertContent"></p>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-lg-12">
                <div class="d-flex justify-content-between buttons">
                    <div>
                        <button id="addNote" type="button" class="btn btn-custom3">Agregar nota</button>
                        <button id="allNotes" type="button" class="btn btn-custom3">Actualizar y volver</button>
                    </div>
                    <div >
                        <button id="edit" type="button" class="btn btn-custom3">Eliminar notas</button>
                        <button id="done" type="button" class="btn btn-custom3">Hecho</button>
                    </div>
                </div>
                <div id="notePad">
                    <textarea rows="10"></textarea>
                </div>
                <div id="notes" class="notes row justify-content-center">
                    <!-- Ajax call to a php file -->
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <p>Adriana Arguello, c.i:29.509.496 &copy; Copyright 2021</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js" integrity="sha512-YHQNqPhxuCY2ddskIbDlZfwY6Vx3L3w9WRbyJCY81xpqLmrM6rL2+LocBgeVHwGY9SXYfQWJ+lcEWx1fKS2s8A==" crossorigin="anonymous"></script>
    <script src="mynotes.js"></script>
</body>
</html>