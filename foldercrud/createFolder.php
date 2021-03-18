<?php
    require_once('class.file.php');

    $myfile = new File();

    $foldername = $_POST['foldername'];
    $id = $_POST['id'];
    
    $path = $myfile->directory.'/'.$foldername.'-'.$id;
    echo $path;
    if(!file_exists($path)) {
        echo var_dump($myfile->createDir($myfile->directory.'/'.$foldername.'-'.$id));
    } else {
        echo 'ya existe un directorio con ese nombre '.$path; exit;
    }

?>