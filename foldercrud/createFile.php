<?php
    require_once('class.file.php');

    $myfile = new File();

    $filename = $_POST['filename'];
    $contenido = $_POST['filecontent'];
    $directorio = $_POST['foldername'];

    if (file_exists($directorio.'/'.$filename.'.txt')){
        $archivo = fopen($directorio.'/'.$filename.'.txt', "a");
        fwrite($archivo, PHP_EOL ."$contenido");
        fclose($archivo);
        echo json_encode(array("code"=>200, "mensaje"=>'Archivo creado correctamente', 'filename'=>$filename));
    } else{
        $archivo = fopen($directorio.'/'.$filename.'.txt', "w");
        fwrite($archivo, PHP_EOL ."$contenido");
        fclose($archivo);
        echo json_encode(array("code"=>200, "mensaje"=>'Archivo creado correctamente', 'filename'=>$filename));
    }

?>