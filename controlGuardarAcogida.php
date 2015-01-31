<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function is_valid_dni_nie($string) 
{
    if (strlen($string) != 9 || preg_match('/^[XYZ]?([0-9]{7,8})([A-Z])$/i', $string, $matches) !== 1) 
    {
        return false;
    }

    $map = 'TRWAGMYFPDXBNJZSQVHLCKE';

    list(, $number, $letter) = $matches;

    return strtoupper($letter) === $map[((int) $number) % 23];
}

function separar_apellidos($apellidos)
{
    return \explode(" ", $apellidos);
}

function idGatos($ids)
{
    $idCadena="";
    foreach ($ids as $idGatetes):
        $idCadena=$idCadena.$idGatetes.",";
    endforeach;
    
    return substr($idCadena,0, strlen($idCadena)-1);
}

//var_dump($_POST);

include './objects/ConexionBD.php';

$objetoConexion= new ConexionBD();

$dni=$_POST["dni"];
$errores=false;

$validado= is_valid_dni_nie($dni);//valido dni

if($validado==1)//si es correcto
    {
        $telefono=$_POST["telefono"]; //ferifico que es un numero
        
        if(!is_numeric($telefono))
        {
            $errores=true;
        }
        
        //recojo el resto de datos necesarios
        $nombreAcogida=$_POST["nombreAcogida"];
        $apellidos=  separar_apellidos($_POST["apellidos"]);
        $direccion=$_POST["direccion"];
        $poblacion=$_POST["poblacion"];
        $provincia=$_POST["provincia"];
        $email=$_POST["email"];
        
        $gatosDatos=$objetoConexion->seleccionarGatosPorID($objetoConexion->conectar(), idGatos($_POST["gatos"]));//selecciono los gatos que va a acoger
        
        $cadenaNombresGatos="";
        
        foreach ($gatosDatos as $nombre):
            $cadenaNombresGatos=$cadenaNombresGatos.$nombre["nombreGato"].", ";
        endforeach;
        
        $cadenaNombresGatos=substr($cadenaNombresGatos,0, strlen($cadenaNombresGatos)-2);
        //guardamos los datos de la casa de acogida y recogemos su id asociado
       // $valor=$objetoConexion->guardarCasaAcogida($objetoConexion->conectar(), $nombreAcogida, $apellidos[0], $apellidos[1], $direccion, $poblacion, $provincia, $telefono, $dni, $email);
        
        $fechaInicial=  date("d/m/Y");
    ?>
        <!DOCTYPE html>
            <html>
                <head>
                    <title>Colonias Canguesas, acogidas</title>
                    <link rel="stylesheet" type="text/css" href="css/menu_nav.css " />
                    <link rel="stylesheet" type="text/css" href="css/datosPersonales.css" />
                    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
                    <link rel="stylesheet" type="text/css" href="css/calendario.css" />
                    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
                    <script>
                        
                        $.datepicker.regional['es'] = 
                        {
                         closeText: 'Cerrar',
                         prevText: '<Ant',
                         nextText: 'Sig>',
                         currentText: 'Hoy',
                         monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                         monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                         dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                         dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sab'],
                         dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
                         weekHeader: 'Sm',
                         dateFormat: 'dd/mm/yy',
                         firstDay: 1,
                         isRTL: false,
                         showMonthAfterYear: false,
                         yearSuffix: ''
                         };
                         
                         
                         $("#fecha").datepicker(
                                 {
                                 firstDay: 1,
                                 showOn: 'both',
                                 showButtonPanel:true,
                                 buttonText: 'Selecciona una fecha',
                                 numberOfMonths: 2,
                                 minDate: -20,
                                 maxDate: +0
                                 });
                                 
                         $.datepicker.setDefaults($.datepicker.regional['es']);
                        
                        $('#fecha').datepicker('option', 'minDate', new Date(2015, 0, 1)); //Ejemplo
                        $(function () 
                        {
                            $("#fecha").datepicker();
                        });
                        
                        
                       
                         
                      
                          
                    </script>

                </head>
                <body>
                    <div id='wrapper_nuevoVeterinario'>
                        <div id="navegacion">
                            <?php include_once 'templates/menu_nav.php'; ?>
                        </div>
                            <hr />
                        <h2>Datos casa acogida</h2>
                            <p>
                                Verifica que los datos introducidos son correctos antes de proceder con el guardado.
                            </p>
                        <div id="formulario_datos_personales">
                            <form action="#" method="POST" name="validarCasa">
                                <label>Nombre</label>
                                <input type="text" name="nombreAcogida" value="<?php echo $nombreAcogida; ?>" placeholder="Nombre acogida" required pattern=".{3,}" maxlength="40">
                                <label>Apellidos</label>
                                <input type="text" name="apellidos" value="<?php echo $apellidos[0]." ".$apellidos[1]; ?>" placeholder="Apellidos acogida" required pattern=".{3,}" maxlength="40">
                                <label>Direcci&oacute;n</label>
                                <input type="text" name="direccion" value="<?php echo $direccion; ?>"  placeholder="Direcci&oacute;n acogida" required pattern=".{3,}" maxlength="149">
                                <label>Poblaci&oacute;n</label>
                                <input type="text" name="poblacion" value="<?php echo $poblacion; ?>"  placeholder="Poblaci&oacute;n" required pattern=".{3,}" maxlength="30">
                                <label>Provincia</label>
                                <input type="text" name="provincia" value="<?php echo $provincia; ?>"  placeholder="Provincia" required pattern=".{4,}" maxlength="20">
                                <label>Tel&eacute;fono</label>
                                <input type="tel" name="telefono" value="<?php echo $telefono; ?>"  placeholder="N&uacute;mero de tel&eacute;fono" required pattern=".{9,}" maxlength="12">
                                <label>DNI</label>
                                <input type="text" name="dni" value="<?php echo $dni; ?>"  placeholder="D.N.I." pattern=".{9,}" maxlength="9">
                                <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
                                
                                <label>Fecha inicio</label>
                                <input type="text" id="fecha" name="fechaInicio" value="<?php echo $fechaInicial; ?>"  required placeholder="Fecha inicio de acogida" maxlength="10">
                                
                                <label>Gato/s acogido/s</label>
                                <input type="text" id="campogatos" name="gatosAcogidos" value="<?php echo $cadenaNombresGatos; ?>" disabled placeholder="Ning&uacute;n gato para acoger" required >
                                
                                <input type="submit" id="enviar" name="GuardarDatos" value="Guardar Datos" />
                            </form>
                        </div>

            
                            <script>
                                 var valor = $('#campogatos').attr("value");
                               if(valor!="")
                               {
                                   $("#enviar").show(1200);
                               }else{
                                   $("#enviar").hide(1200);
                               }
                          
                            </script>
        
        
    <?php
    }else{
        echo "errores en los datos";
    }

