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
                    <script src="js/jquery-1.11.2.min.js"></script>
                    <script type="text/javascript" src="js/botonesEliminarVeterinario.js"></script>
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
                                   <th scope="col">ID</th>
                                   <th scope="col">Veterinario</th>
                                   <th scope="col">Poblaci&oacute;n</th>
                                   <th scope="col">Tel&eacute;fono</th>
                                   <th scope="col">Urgencias</th>
                                   <th scope="col" colspan="2">Administraci&oacute;n</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    number_format($numero, 2, ",", ".");
                                        
                                    foreach ( $datosVeterinarios as $datosMostrar):
                                        echo "<tr>";
                                        echo "<td>".$datosMostrar["idVeterinario"]."</td>";
                                        echo "<td>".$datosMostrar["nombreVeterinario"]."</td>";
                                        echo "<td>".$datosMostrar["ayuntamiento"]."</td>";
                                        echo "<td>".telefono($datosMostrar["telefono"])."</td>";
                                        echo "<td>".telefono($datosMostrar["tlfUrgencias"])."</td>";
                                        echo "<td><a href='#' id='".$datosMostrar["idVeterinario"]."'>Borrar</a></td>";
                                        echo "<td><a href='#' id='".$datosMostrar["idVeterinario"]."'>Modificar</a></td>";
                                       // echo "<td><input type='button' name='".$datosMostrar["idVeterinario"]."' value='BORRAR VETERINARIO' onClick='id()' /></td>";
                                        echo "<tr/>";
                                    endforeach;
                                    
                                    
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" colspan="7"><small>Colonias canguesas 2015</small></th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div>
                        
                    </div>
                    

                </body>
            </html>
                
            
        <?php
            
        }
?>