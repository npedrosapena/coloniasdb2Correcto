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
        $datosAcogida=$BaseDatos->mostrarCasasAcogida($BaseDatos->conectar());
        
        ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <title>Colonias Canguesas, Casas de acogida</title>
                    <link rel="stylesheet" type="text/css" href="css/menu_nav.css " />
                    <link rel="stylesheet" type="text/css" href="css/tablaAcogidas.css" />
                <body>
                    <div id='wrapper_documentacion'>
                        <div id="navegacion">
                            <?php include_once 'templates/menu_nav.php'; ?>
                        </div>
                        <hr/>
                        <div>                            
                            <span><h2>Casas de acogida</h2></span>
                            
                             <div id="Tabla_Acogidas">
                            <table class="zebra">
                                <caption>Casas de acogida</caption>
                                <thead>
                                 <tr>
                                   <th scope="col">Nombre</th>
                                   <th scope="col">Direcci&oacute;n</th>
                                   <th scope="col">Poblaci&oacute;n</th>
                                   <th scope="col">Tel&eacute;fono</th>
                                   <th scope="col">Gatos en acogida totales</th>
                                   <th scope="col">Gatos acogidos actualmente</th>
                                  </tr> 
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    number_format($numero, 2, ",", ".");
                                        
                                    foreach (  $datosAcogida as $datosCasa ):
                                        echo "<tr>";
                                        echo "<td>".$datosCasa["nombreAcogida"]." ".$datosCasa["apellido1"]." ".$datosCasa["apellido2"]."</td>";
                                        echo "<td>".$datosCasa["direccion"]."</td>";
                                        echo "<td>".$datosCasa["poblacion"]."</td>";
                                        echo "<td>".telefono($datosCasa["telefono"])."</td>";
                                        echo "<td WIDTH='100' >".telefono($datosCasa["tlfUrgencias"])."</td>";
                                        echo "<td WIDTH='100'>".telefono($datosCasa["tlfUrgencias"])."</td>";
                                        echo "<tr/>";
                                    endforeach;
                                    
                                    
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="col" colspan="6"><small>Colonias canguesas 2015</small></th>
                                    </tr>
                                </tfoot>
                            </table>
                             <div id="botones_casa_acogida">
                                <input type="button" class="button_active" value="Admin. casas acogida" onclick="location.href='controlBorrarVeterinario.php';" />
                                <input type="button" class="button_active" value="Nueva casa acogida" onclick="location.href='nuevaCasaAcogida.php';" />
                            </div>
                       
                        </div>
                </body>
            </html>
                
            
        <?php
            
        }
?>

