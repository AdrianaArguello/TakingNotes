<?php

    $filename = $_POST['filename'];
    $writetext = $_POST['filecontent'];
    $folder= $_POST['foldername'];


    $path = $folder.'/'.$filename.'.txt';

    if (file_exists($path)){
        $edit_file = fopen($path, 'a');
        if($edit_file){
            fwrite($edit_file, $writetext);
            fclose($edit_file);
            echo json_encode(array("code"=>200, "mensaje"=>'Archivo modificado correctamente'));
        } else {
            echo json_encode(array("code"=>404, "mensaje"=>'No se modifico el archivo'));
        }
    } else {
        echo json_encode(array("code"=>404, "mensaje"=>'El archivo no existe'));
    }

?>