
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Colonias Canguesas. Informaci&oacute;n interna</title>
        <link type="text/css" rel="stylesheet" href="css/index.css" />
    </head>
    <body>
        <div id="wrapper">
            
            <!-- logo Colonias Canguesas -->
            <img src="images/logo.jpeg" alt="Colonias Canguesas" title="Colonias Canguesas" />
            
            <!-- formulario acceso -->
            <div id="access_form">
                <form action="controlUsuario.php" method="POST">
                   
                    <span class='inputs'>
                        <label for="usuario"> Usuario: </label>
                        <input type="text" id="usuario" name="usuario" placeholder="Nombre usuario" required />
                    </span>

                    <span class="inputs">
                        <label for="clave"> Contrase&ntilde;a: </label>
                        <input type="password" id="clave" name="clave" placeholder="Clave usuario" required />
                    </span>
                    
                    <div id="btn_access">
                        <input type="submit" value='Acceder' />
                        <input type="reset" value='Limpiar'/>
                    </div>
                </form>
                
            </div>
        </div>
    </body>
</html>
