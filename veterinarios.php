<?php
session_start();

if(!isset($_SESSION['active']))
    {
        die("no vayas de listo");
    }else
        {
        
            function telefono($numero) 
            {

                $numero = str_replace(array(" ", "-"), array(""), $numero);
                $comienzo = strlen($numero);
                $resultado = '';

                while($comienzo>=0) 
                    {
                        $resultado = substr($numero, $comienzo, 3) . " " . $resultado;
                        $comienzo -= 3;
                    }

                return $resultado;
            }
        
        include './objects/ConexionBD.php';
        
        $BaseDatos= new ConexionBD();
        $datosVeterinarios=$BaseDatos->seleccionarVeterinarios($BaseDatos->conectar());
        ?>

            <!DOCTYPE html>
            <html>
                <head>
                    <title>Colonias Canguesas, Veterinarios</title>
                    <link rel="stylesheet" type="text/css" href="css/menu_nav.css " />
                    <link rel="stylesheet" type="text/css" href="css/tablaVeterinarios.css" />
                </head>
                <body>
                    <div id='wrapper_veterinarios'>
                        <div id="navegacion">
                            <?php include_once 'templates/menu_nav.php'; ?>
                        </div>
                        <hr/>
                        <span><h2>Lista de veterinarios</h2></span>
                        <div id="Tabla_Veterinarios">
                            <table class="zebra">
                                <caption>Veterinarios</caption>
                                <thead>
                                 <tr>
                                   <th scope="col">Veterinario</th>
                                   <th scope="col">Direcci&oacute;n</th>
                                   <th scope="col">Poblaci&oacute;n</th>
                                   <th scope="col">Tel&eacute;fono</th>
                                   <th scope="col">Urgencias</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    number_format($numero, 2, ",", ".");
                                        
                                    foreach ( $datosVeterinarios as $datosMostrar):
                                        echo "<tr>";
                                        echo "<td>".$datosMostrar["nombreVeterinario"]."</td>";
                                        echo "<td>".$datosMostrar["direccion"]."</td>";
                                        echo "<td>".$datosMostrar["ayuntamiento"]."</td>";
                                        echo "<td>".telefono($datosMostrar["telefono"])."</td>";
                                        echo "<td>".telefono($datosMostrar["tlfUrgencias"])."</td>";
                                        echo "<tr/>";
                                    endforeach;
                                    
                                    
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" colspan="5"><small>Colonias canguesas 2015</small></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div id="botones_veterinarios">
                                <input type="button" class="button_active" value="Admin. veterinarios" onclick="location.href='controlBorrarVeterinario.php';" />
                                <input type="button" class="button_active" value="Nuevo veterinario" onclick="location.href='nuevoVeterinario.php';" />
                            </div>
                        </div>
                        
                    </div>

                </body>
            </html>
                
            
        <?php
            
        }
?>


