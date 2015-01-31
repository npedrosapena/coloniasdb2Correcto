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
                    <title>Colonias Canguesas, datos personales</title>
                    <link rel="stylesheet" type="text/css" href="css/menu_nav.css " />
                    <link rel="stylesheet" type="text/css" href="css/datosPersonales.css " />
                    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
                </head>
                <body>
                    <div id='wrapper_datosPersonales'>
                        <div id="navegacion">
                            <?php include_once 'templates/menu_nav.php'; ?>
                        </div>
                        <hr />
                        <h2>Datos personales</h2>
                        <div id="formulario_datos_personales">
                            <form action="#" method="POST">
                                <label>Nombre</label>
                                <input type="text" value="<?php echo $_SESSION['nombreUsuario']; ?>" required>
                                <label>Clave nueva</label>
                                <input type="password" name="claveNueva" placeholder="Nueva clave" required>
                                <label>Repite clave nueva</label>
                                <input type="password" name="repetirClaveNueva" placeholder="Repita la nueva clave" required>
                                
                                
                                <input type="submit" name="GuardarDatos" value="Guardar Datos" />
                            </form>
                        </div>
                            
                    </div>

                </body>
            </html>
                
            
        <?php
            
        }
?>

