<?php
class ConexionBD
{
    
    
    public function conectar()
    {
        $USER="nelson";
        $PASS="bre2vebre2ve";
        $DB="coloniascanguesas";
        $SERVER="localhost";
        
        $mysqli= new mysqli($SERVER, $USER, $PASS, $DB);
        
        return $mysqli;

    }
    
    public function verificarUsuario($mysqli,$nombreVoluntario,$claveVoluntario)
    {
        $resultado = $mysqli->query("SELECT nombreVoluntario from voluntarios where nombreVoluntario='".$nombreVoluntario."' and claveVoluntario='".$claveVoluntario."'");
        $fila = $resultado->fetch_assoc();
        
        if($fila!=null)
            {
                return true;
            }else
                {
                 return false;
                }
                
                mysqli_close($mysqli);
    }
    
    public function permisosUsuario($mysqli,$nombreVoluntario)
    {
        $resultado = $mysqli->query("SELECT permisos from voluntarios where nombreVoluntario='".$nombreVoluntario."'");
        $fila = $resultado->fetch_assoc();
        
        if($fila!=null)
            {
                return $fila["permisos"];
            }else
                {
                 return false;
                }
                
                mysqli_close($mysqli);
        
    }
    
    
    public function seleccionarVeterinarios($mysqli)
    {
        $resultado = $mysqli->query("SELECT * from veterinarios");
        $fila = $resultado;
        
        if($fila!=null)
            {
                return $fila;
            }else
                {
                 return false;
                }
                
                mysqli_close($mysqli);
    }
    
    public function guardarVeterinario($mysqli,$nombreVeterinario,$direccion,$poblacion,$telefono,$tlfUrgencias)
    {
        $stmt = $mysqli->prepare("INSERT INTO veterinarios(nombreVeterinario, direccion, ayuntamiento, telefono , tlfUrgencias) VALUES ('".$nombreVeterinario."', '".$direccion."', '".$poblacion."', '".$telefono."', '".$tlfUrgencias."')");
        $stmt->execute();
        
        mysqli_close($mysqli);
    }
    
    
    public function mostrarCasasAcogida($mysqli)
    {
        $resultado = $mysqli->query("SELECT * from casaAcogida");
        $fila = $resultado;
        
        if($fila!=null)
            {
                return $fila;
            }else
                {
                 return false;
                }
                
                mysqli_close($mysqli);
        
    }
    
    /**Guarda y nos devuelve el id de la última casa guardada
     * 
     * @param type $mysqli
     * @param type $nombreAcogida
     * @param type $apellido1
     * @param type $apellido2
     * @param type $direccion
     * @param type $poblacion
     * @param type $provincia
     * @param type $telefono
     * @param type $dni
     * @param type $email
     * @return boolean
     */
     public function guardarCasaAcogida($mysqli,$nombreAcogida,$apellido1,$apellido2,$direccion,$poblacion,$provincia,$telefono,$dni,$email)
    {
        $stmt = $mysqli->prepare("INSERT INTO casaAcogida(`nombreAcogida`,`apellido1`,`apellido2`,`direccion`,`poblacion`,`provincia`,`telefono`,`dni`,`email`) VALUES ('".$nombreAcogida."', '".$apellido1."','".$apellido2."','".$direccion."', '".$poblacion."', '".$provincia."','".$telefono."', '".$dni."','".$email."')");
        $stmt->execute();
        
        $resultado = $mysqli->query("SELECT * from casaAcogida where dni='".$dni."'");
        $fila = $resultado;
        
        if($fila!=null)
            {
                return $fila;
            }else
                {
                 return false;
                }
        
        mysqli_close($mysqli);
    }
    
    public function guardarAsociacionAcogidaCasaConGato($mysqli,$idGato,$idCasa,$fechaEntrada,$fechaSalida)
    {
        $stmt = $mysqli->prepare("INSERT INTO acogida(`idGato`,`idCasa`,`fechaEntrada`,`fechaSalida`) VALUES ('".$idGato."', '".$idCasa."','".$fechaEntrada."','".$fechaSalida."')");
        $stmt->execute();
        
        mysqli_close($mysqli);
    }
    
    
    
    public function seleccionarGatos($mysqli)
    {
        $resultado = $mysqli->query("SELECT * from gatos where fallecido='0'");
        $fila = $resultado;

        if($fila!=null)
            {
                return $fila;
            }else
                {
                 return false;
                }

                mysqli_close($mysqli);
    }
    
    public function seleccionarGatosPorID($mysqli, $idGatos)
    {
        $resultado=$mysqli->query("SELECT * FROM `gatos` WHERE `fallecido`=0 and `idGato` in (".$idGatos.")");
        
        $fila = $resultado;

        if($fila!=null)
            {
                return $fila;
            }else
                {
                 return false;
                }

                mysqli_close($mysqli);
    }
}
