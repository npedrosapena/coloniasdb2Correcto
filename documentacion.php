<?php
session_start();

if(!isset($_SESSION['active']))
    {
        die("no vayas de listo");
    }else
        {
        
        include './objects/ConexionBD.php';
        
        $BaseDatos= new ConexionBD();
        
        ?>

            <!DOCTYPE html>
            <html>
                <head>
                    <title>Colonias Canguesas, Documentaci&oacute;n</title>
                    <link rel="stylesheet" type="text/css" href="css/menu_nav.css " />
                    <link rel="stylesheet" type="text/css" href="css/tablaDocumentacion.css " />
                <body>
                    <div id='wrapper_documentacion'>
                        <div id="navegacion">
                            <?php include_once 'templates/menu_nav.php'; ?>
                        </div>
                        <hr/>
                        <div>                            
                            <span><h2>Documentaci&oacute;n Colonias Canguesas</h2></span>
                            
                            <div id="tabla_documentacion">
                                <table class="zebra">
                                <caption>Documentaci&oacute;n B&aacute;sica</caption>
                                    <tr>
                                        <td>
                                            <a href="documentacion/ACTA FUNDACIONAL-colonias.odt">Acta fundacional de Colonias Canguesas</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="documentacion/ESTATUTOS colonias canguesas.doc">Estatutos de Colonias Canguesas</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="documentacion/NUEVO CONTRATO DE ACOGIDA colonias.doc">Contrato para casas de acogida</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="documentacion/contrato de adopcion colonias (1).doc">Contrato para adopciones</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Test pre-adopci&oacute;n</a>
                                        </td>
                                    </tr>
                                </table>
                            
                            <br />
                            
                                <table class="zebra">
                                <caption>Documentaci&oacute;n Actas</caption>
                                    <tr>
                                        <td>
                                            <a href="#">Nombre acta</a>
                                        </td>
                                        <td>
                                          fecha
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                            
                        
                        </div>
                </body>
            </html>
                
            
        <?php
            
        }
?>