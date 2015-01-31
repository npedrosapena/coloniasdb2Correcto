<?php
include './objects/ConexionBD.php';

$objetoConexion= new ConexionBD();

$nombreVeterinario=$_POST["nombreVeterinario"];
$direccion=$_POST['direccion'];
$poblacion=$_POST["poblacion"];
$telefono=$_POST["telefono"];
$tlfUrgencias=$_POST["tlfurgencia"];
$errores=false;

//control de errores

if(!is_numeric($telefono))
    {
        $errores=true;
    }
    
    if(!$errores)
        {
            if($tlfUrgencias=="")
                {
                    $tlfUrgencias=null;
                    $errores=false;
                }else
                    {
                        if(!is_numeric($tlfUrgencias))
                            {
                                $errores=true;
                            }
                    }    
        
        }
if(!$errores)
    {
        $objetoConexion->guardarVeterinario($objetoConexion->conectar(), $nombreVeterinario, $direccion,$poblacion, $telefono, $tlfUrgencias);
        echo 'guardado correctamente';
        
    }else{
        echo 'hay errores';
    }

