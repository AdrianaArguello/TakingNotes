<?php
    require_once('class.file.php');

    $myfile = new File();

    $foldername = $_POST['foldername'];
    $oldfolder = $_POST['oldfolder'];;

    $oldPath = $myfile->directory.'/'.$oldfolder;
    $newPath = $myfile->directory.'/'.$foldername;

    if(!file_exists($newPath)) {
        echo var_dump($myfile-> renameDir($oldPath,$newPath));
    } else {
        echo 'ya existe un directorio con ese nombre '.$newPath; exit;
    }

?>