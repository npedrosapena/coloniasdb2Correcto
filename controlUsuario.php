<?php

include './objects/ConexionBD.php';

$objetoConexion= new ConexionBD();

$nombreVoluntario=$_POST['usuario'];
$claveVoluntario=$_POST['clave'];

if($objetoConexion->verificarUsuario($objetoConexion->conectar(), $nombreVoluntario, $claveVoluntario))
{
    session_start();
    
  
    header('Location:inicio.php');
    $_SESSION['active']=  time();
    $_SESSION['nombreUsuario']= $nombreVoluntario;
    

   
}else
    {
    echo 'aqui ira una pagina de error';
    }


