<?php

 $status = "";
 
    if ($_POST["action"] == "upload") 
    {
        // obtenemos los datos del archivo 
        $tamano = $_FILES["archivo"]['size'];
        $tipo = $_FILES["archivo"]['type'];
        $archivo = $_FILES["archivo"]['name'];
        $prefijo = substr(md5(uniqid(rand())),0,6);

        if ($archivo != "") 
            {
                // guardamos el archivo a la carpeta files
                $uploaddir = getcwd().'/facturas/'; //ruta completa
                $uploadfile = $uploaddir . basename($prefijo."_".$archivo);
                
                if (move_uploaded_file($_FILES['archivo']['tmp_name'],$uploadfile)) 
                {
                        $status = "Archivo subido: <b>".$archivo."</b>";
                        
                } else 
                    {
                        $status = "Error al subir el archivo";
                        echo $_FILES["archivo"]["error"];
                    }
            } else 
                {
                $status = "Error al subir archivo";
                echo $_FILES["archivo"]["error"];
                }
                
                echo $status;
    }

