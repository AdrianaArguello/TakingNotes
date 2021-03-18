<?php
session_start();
include('connection.php');

//<!--Check user inputs-->
//    <!--Define error messages-->
$errors = '';
$missingUsername = '<p><strong>Por favor ingresa tu usuario!</strong></p>';
$missingEmail = '<p><strong>Por favor ingresa tu direccion de correo electronico!</strong></p>';
$invalidEmail = '<p><strong>Por favor ingresa una direccion de correo valida!</strong></p>';
$missingPassword = '<p><strong>Por favor ingresa tu contraseña!</strong></p>';
$invalidPassword = '<p><strong>Su contraseña debe de tener almenos 6 caracteres, debe incluir una letra mayuscula y un numero!</strong></p>';
$differentPassword = '<p><strong>Las contraseñas no son iguales</strong></p>';
$missingPassword2 = '<p><strong>Por favor confirma tu contraseña!</strong></p>';

if(empty($_POST["username"])){
    $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}

if(empty($_POST["email"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
}

if(empty($_POST["password"])){
    $errors .= $missingPassword;
}elseif(!(strlen($_POST["password"])>6
            and preg_match('/[A-Z]/',$_POST["password"])
            and preg_match('/[0-9]/',$_POST["password"])
        )
){
    $errors .= $invalidPassword;
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}
//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$password = mysqli_real_escape_string($link, $password);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';  exit;
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">Este correo ya esta registrado. ¿Quieres iniciar sesion?</div>';  exit;
}

$activationKey = bin2hex(openssl_random_pseudo_bytes(16));

$sql = "INSERT INTO users (`username`, `email`, `password`, `activation`) VALUES ('$username', '$email', '$password', '$activationKey')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Hubo un error agregando el usuario en la base de datos!</div>';
    exit;
}

$message = "Hola! somos Taking Notes, Por favor haz click para activar tu cuenta:\n\n";
$message .= "http://localhost/notesApp/activate.php?email="  . urlencode($email) . "&key=$activationKey";
if(mail($email, 'Confirm your Registration', $message, 'From:'.'Adriana.arguello2906@gmail.com')){
    echo "<div class='alert alert-success'>Thank for your registring! A confirmation email has been sent to $email. Please click on the activation link to activate your account.</div>";
}
?>


