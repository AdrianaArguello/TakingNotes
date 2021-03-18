<?php
    require_once('class.file.php');

    $myfile = new File();
    $directorio_global ="global_directory";

    if(file_exists($directorio_global)){
        listar_directorios_ruta($directorio_global."/");
    } else {
        mkdir(__DIR__ . "/$directorio_global");
    }

    function listar_directorios_ruta($ruta){
        if (is_dir($ruta)) {
            if ($dh = opendir($ruta)) {
                while (($file = readdir($dh)) !== false) {
                    if (is_dir($ruta. $file) && $file!="." && $file!=".." && filetype($ruta.$file) == "dir"){
                        echo "<option value='$ruta$file'>$ruta$file</option>";
                        listar_directorios_ruta($ruta . $file . "/");
                    }
                }
            closedir($dh);
            }
        }else echo "<br>No es ruta valida";
    }

?>