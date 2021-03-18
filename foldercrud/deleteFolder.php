<?php
    require_once('class.file.php');

    $myfile = new File();

    $foldername = $_POST['foldername'];

    $path = $myfile->directory.'/'.$foldername;

    if(file_exists($path)) {
        $carpeta = @scandir($path);
        if (count($carpeta) > 2){
            echo 'El directorio tiene archivos';
            echo var_dump($myfile->deleteDirRecursively($path));
        }else{
            echo 'El directorio está vacío';
            echo var_dump($myfile->deleteEmptyDir($path));
        }
    } else {
        echo 'ya existe un directorio con ese nombre '.$newPath; exit;
    }


?>