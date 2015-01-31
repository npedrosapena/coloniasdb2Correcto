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
                    <title>Colonias Canguesas, menu principal</title>
                    <link rel="stylesheet" type="text/css" href="css/menu_nav.css " />
                </head>
                <body>
                    <div id='wrapper_inicio'>
                        <div id="navegacion">
                            <?php include_once 'templates/menu_nav.php'; ?>
                        </div>
                            
                    </div>

                </body>
            </html>
                
            
        <?php
            
        }
?>

