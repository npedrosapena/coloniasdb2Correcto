<?php
session_start();

if(!isset($_SESSION['active']))
    {
        die("no vayas de listo");
    }else
        {
        include './objects/ConexionBD.php';
        
        $BaseDatos= new ConexionBD();
        $gatos=$BaseDatos->seleccionarGatos($BaseDatos->conectar());
        
        ?>

            <!DOCTYPE html>
            <html>
                <head>
                    <title>Colonias Canguesas, nueva casa acogida</title>
                    <link rel="stylesheet" type="text/css" href="css/menu_nav.css " />
                    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
                    <link rel="stylesheet" type="text/css" href="css/datosPersonales.css " />
                </head>
                <body>
                    <div id='wrapper_nuevoVeterinario'>
                        <div id="navegacion">
                            <?php include_once 'templates/menu_nav.php'; ?>
                        </div>
                            <hr />
                        <h2>Datos casa acogida</h2>
                        <div id="formulario_datos_personales">
                            <form action="controlGuardarAcogida.php" method="POST">
                                <label>Nombre</label>
                                <input type="text" name="nombreAcogida" placeholder="Nombre acogida" required pattern=".{3,}" maxlength="40">
                                <label>Apellidos</label>
                                <input type="text" name="apellidos" placeholder="Apellidos acogida" required pattern=".{3,}" maxlength="40">
                                <label>Direcci&oacute;n</label>
                                <input type="text" name="direccion" placeholder="Direcci&oacute;n acogida" required pattern=".{3,}" maxlength="149">
                                <label>Poblaci&oacute;n</label>
                                <input type="text" name="poblacion" placeholder="Poblaci&oacute;n" required pattern=".{3,}" maxlength="30">
                                <label>Provincia</label>
                                <input type="text" name="provincia" placeholder="Provincia" required pattern=".{4,}" maxlength="20">
                                <label>Tel&eacute;fono</label>
                                <input type="tel" name="telefono" placeholder="N&uacute;mero de tel&eacute;fono" required pattern=".{9,}" maxlength="12">
                                <label>DNI</label>
                                <input type="text" name="dni" placeholder="D.N.I." pattern=".{9,}" maxlength="9">
                                
                                <small>Deja pulsado ctrl para m&uacute;ltiple selecci&oacute;n.   Nombre de gato en fondo verde = en acogida.</small>
                                
                                <select name="gatos[]" multiple>
                                    <?php 
                                            foreach ($gatos as $datosGatos):
                                      
                                                if($datosGatos["acogida"]!=0)
                                                    {
                                                      echo "<option value='".$datosGatos["idGato"]."' style='background: #00aa00; color: #FFF;'>".$datosGatos["nombreGato"]."</option>";
                                                    }else
                                                        {
                                                            echo "<option value='".$datosGatos["idGato"]."'>".$datosGatos["nombreGato"]."</option>";
                                                        }
                                            endforeach;
                                    ?>
                                    
                                </select>
                                <input type="submit" name="GuardarDatos" value="Guardar Datos" />
                            </form>
                        </div>
                    </div>

                </body>
            </html>
                
            
        <?php
            
        }
?>



