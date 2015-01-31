<?php
session_start();

include './objects/ConexionBD.php';

$objetoConexion= new ConexionBD();

$permiso=$objetoConexion->permisosUsuario($objetoConexion->conectar(), $_SESSION['nombreUsuario']);

if($permiso<9)
    {
    echo '<center><h2>No tienes permisos suficientes para hacer eso</h2></center>';
    }else
        {
            header('Location:listadoVeterinariosAdministrar.php');
        }