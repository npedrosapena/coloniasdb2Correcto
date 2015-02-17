<?php
session_start();

if(!isset($_SESSION['active']))
    {
        die("no vayas de listo");
    }else
        {
        include './objects/ConexionBD.php';
        
        $directorio=  opendir("./facturas/"); //directorio de facturas
        $BaseDatos= new ConexionBD();
        $datosVeterinarios=$BaseDatos->seleccionarVeterinarios($BaseDatos->conectar());
        ?>

            <!DOCTYPE html>
            <html>
                <head>
                    <title>Colonias Canguesas, Facturas</title>
                    <link rel="stylesheet" type="text/css" href="css/menu_nav.css " />
                    <link rel="stylesheet" type="text/css" href="css/tablaVeterinarios.css" />
                </head>
                <body>
                    <div id='wrapper_facturas'>
                        <div id="navegacion">
                            <?php include_once 'templates/menu_nav.php'; ?>
                        </div>
                        <hr/>
                        <span><h2>Lista de facturas</h2></span>
                        <div id="Tabla_Facturas">
                            <table class="zebra">
                                <caption>Facturas</caption>
                                <thead>
                                 <tr>
                                   <th scope="col">Veterinario</th>
                                   <th scope="col">Fecha</th>
                                   <th scope="col">Factura</th>
                                   <th scope="col">Cuant&iacute;a</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                                        {
                                            if (!is_dir($archivo))//verificamos si es o no un directorio
                                            {
                                                 echo "<tr><th>".$archivo . "</th></tr>"; //de ser un directorio lo envolvemos entre corchetes
                                            }
                                           
                                        }
                                        closedir($directorio);
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" colspan="4"><small>Colonias canguesas 2015</small></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div id="botones_veterinarios">
                               <!-- <input type="button" class="button_active" value="Admin. veterinarios" onclick="location.href='controlBorrarVeterinario.php';" /> -->
                                <input type="button" class="button_active" value="Nueva Factura" onclick="location.href='subirFactura.php';" />
                            </div>
                        </div>
                        
                    </div>

                </body>
            </html>
                
            
        <?php
            
        }
?>


