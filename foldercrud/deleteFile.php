<?php
    require_once('class.file.php');

    $myfile = new File();

    $filename = $_POST['filename'];
    $folder= $_POST['folder'];

    $path = $folder.'/'.$filename.'.txt';
    if (file_exists($path)){
        if (!unlink($path)) {
            echo json_encode(array("code"=>404, "mensaje"=>"No se borro el archivo $path"));
            exit;
        } else {
            echo json_encode(array("code"=>200, "mensaje"=>"$path ha sido eliminado"));

            exit;
        }
    } else {
        echo json_encode(array("code"=>404, "mensaje"=>'El archivo no existe'));
    }

?>