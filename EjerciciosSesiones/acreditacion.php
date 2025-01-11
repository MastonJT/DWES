<?php
    include("../saneamiento.php");
    session_name("ejer3");
    session_start();

    if(isset($_GET["error"])){
        $autenticado="Autenticación errónea. Vuelva a intentarlo";
    }else{
        $autenticado="Aún no se ha autenticado rellene el formulario";
    }
   

    if(isset($_SESSION["nombre"]) && isset($_SESSION["contrasena"])){
        $autenticado="Ya está autenticado";
        Header("Location:aplicacion.php");
    }else{
        if(isset($_REQUEST["envio"])){
            $nombre=sanear($_REQUEST["nombre"]);
            $contrasena=sanear($_REQUEST["contrasena"]);
			
            if($nombre=="usuario" && $contrasena=="123"){
                $_SESSION["usuario"]=$nombre;
                $_SESSION["contrasena"]=$contrasena;
                Header("Location:aplicacion.php");
            }else{
                header("Location:acreditacion.php?error=invalido");
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario de autenticación</h1>
    <span><?php print $autenticado;?></span>
    <p>Introduce tu nombre de usuario y contraseña</p>
    <form method="POST" action="acreditacion.php">
        <p>Nombre de usuario: <input type="text" name="nombre"></p>
        <p>Contraseña: <input type="text" name="contrasena"></p>
        <input type="submit" name="envio" value="Inicio de sesión">
    </form>
    <p>Para ENTRAR debes INTRODUCIR usuario en el 1er campo y 123 en el 2do</p>
</body>
</html>