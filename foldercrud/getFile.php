<?php

    $filename = $_POST['filename'];
    $folder= $_POST['foldername'];
    $contenido = '';

    $path = $folder.'/'.$filename.'.txt';
    if (file_exists($path)){
        $archivoID = fopen($path, "r");
        //
        while( !feof($archivoID)){
            $linea = fgets($archivoID, 1024);
            $contenido .= $linea. PHP_EOL;
        }
        //
        fclose($archivoID);
        echo json_encode(array("code"=>200, "contenido"=>$contenido ));
    } else {
        echo json_encode(array("code"=>404, "mensaje"=>'El archivo no existe'));
    }
?>