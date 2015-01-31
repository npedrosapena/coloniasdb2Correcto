<?php
session_start();

if(!isset($_SESSION['active']))
    {
        die("no vayas de listo");
    }else
        {
        ?>

            <!DOCTYPE html>
            <html>
                <head>
                    <title>Colonias Canguesas, nuevo veterinario</title>
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
                        <h2>Datos veterinario</h2>
                        <div id="formulario_datos_personales">
                            <form action="controlGuardarVeterinario.php" method="POST">
                                <label>Nombre</label>
                                <input type="text" name="nombreVeterinario" placeholder="Nombre veterinario" required pattern=".{3,}" maxlength="40">
                                <label>Direcci&oacute;n</label>
                                <input type="text" name="direccion" placeholder="Direcci&oacute;n veterinario" required pattern=".{3,}" maxlength="149">
                                <label>Poblaci&oacute;n</label>
                                <input type="text" name="poblacion" placeholder="Poblaci&oacute;n" required pattern=".{3,}" maxlength="30">
                                <label>Tel&eacute;fono</label>
                                <input type="tel" name="telefono" placeholder="N&uacute;mero de tel&eacute;fono" required pattern=".{9,}" maxlength="12">
                                <label>Tel&eacute;fono de urgencias</label>
                                <input type="tel" name="tlfurgencia" placeholder="N&uacute;mero de urgencias" pattern=".{9,}" maxlength="12">
                                
                                
                                <input type="submit" name="GuardarDatos" value="Guardar Datos" />
                            </form>
                        </div>
                    </div>

                </body>
            </html>
                
            
        <?php
            
        }
?>



