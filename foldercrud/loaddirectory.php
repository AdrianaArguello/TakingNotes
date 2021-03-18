<?php
    $directorio_global ="global_directory";

    if(file_exists($directorio_global)){
        listar_directorios_ruta($directorio_global."/");
    } else {
        mkdir(__DIR__ . "/$directorio_global");
    }

    function listar_directorios_ruta($ruta){
        // abrir un directorio y listarlo recursivo
        if (is_dir($ruta)) {
            if ($dh = opendir($ruta)) {
                while (($file = readdir($dh)) !== false) {
                    //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
                    //mostraría tanto archivos como directorios
                    if (is_dir($ruta. $file) && $file!="." && $file!=".." && filetype($ruta.$file) == "dir"){
                        //solo si el archivo es un directorio, distinto que "." y ".."
                        // echo "<br>Directorio: $ruta.//.$file";
                        echo "
                            <tr>
                                <td class='folderheader' id='$file' style='word-wrap: break-word;'>$file</td>
                                <td style='word-wrap: break-word;'>".$ruta.$file."</td>
                                <td style='word-wrap: break-word;'>".filetype($ruta.$file)."</td>
                                <td class='delete'><button class='btn btn-danger' style='width:100%; align-self: center;'><i class='fas fa-trash-alt'></i></button></td>
                              
                            </tr>";
                        // echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta.$file);
                        listar_directorios_ruta($ruta . $file . "/");
                    }
                }
            closedir($dh);
            }
        }else echo "<br>No es ruta valida";
    }

?>
