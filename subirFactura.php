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
                    <title>Colonias Canguesas, subir factura</title>
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
                        <h2>Subir factura</h2>
                        <div id="formulario_datos_personales">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <input name="archivo" type="file" size="35" accept="application/pdf" />
                              <input name="enviar" type="submit" value="Subir archivo" />
                              <input name="action" type="hidden" value="upload" />     
                            </form>
                        </div>
                    </div>

                </body>
            </html>
                
            
        <?php
            
        }
?>



