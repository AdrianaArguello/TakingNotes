<?php
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
                    if (is_dir($ruta) && $file!="." && $file!=".."){
                        if(filetype($ruta.$file) == "file"){
                            echo "
                                <tr class='mytable'>
                                    <td class='folderheader' id='$file' style='word-wrap: break-word;'>$file</td>
                                    <td class='folderpath' id='$ruta' style='word-wrap: break-word;'>".$ruta.$file."</td>
                                    <td style='word-wrap: break-word;'>".filetype($ruta.$file)."</td>
                                    <td class='delete'><button class='btn btn-danger' style='width:100%; align-self: center;'><i class='fas fa-trash-alt'></i></button></td>
                                </tr>";
                            }
                            listar_directorios_ruta($ruta . $file . "/");
                        // echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta.$file);
                    }
                }
            closedir($dh);
            }
        }else echo "<br>No es ruta valida";
    }

?>
