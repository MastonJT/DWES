<?php
    session_name("ejer3");
    session_start();

    if(isset($_SESSION["usuario"]) || isset($_SESSION["contrasena"])){
        $id=session_id();
        $nomSesion=session_name();
        session_unset();
        session_destroy();
    }

    if(isset($_GET["resultado"])){
        $resultado=$_GET["resultado"];
        if($resultado=="correcto"){
            $variableSesion="La variable de sesión autenticada ya no está definida";
            $sesionFinalizada="Sesión finalizada correctamente";
            $id="";
            $nomSesion="";
            print "<p>Ahora estás fuera de la aplicación segura</p>";
        }else{
            $variableSesion="Nombre: ".$_SESSION['nombre']."Contraseña: ".$_SESSION['contrasena'];
            $sesionFinalizada="Error no se ha finalizado la seisión correctamente";
        }
    }else{
        $variableSesion="";
        $sesionFinalizada="";
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
    <h1>FINALIZAR LA SESIÓN</h1>
    <p>==============================</p>
    <p>Identificador de la sesión: <?php print $id;?></p>
    <p>Nombre de la sesión: <?php print $nomSesion;?></p>
    <p><?php print $variableSesion;?></p>
    <p><?php print $sesionFinalizada;?></p>
    <a href="comprobacion.php">Comprobar los valores en otra página (no se mostrará nada por haber finalizado la sesión)</p>
    <a href="acreditacion.php">Volver a la página principal</a>
</body>
</html>
