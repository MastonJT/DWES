<?php
session_name("GlobalSesiones");
session_id("Sesion1");
session_start();
$user = null;
$pass = null;
$error = "";
if (!isset($_REQUEST['enviar'])) {
    enviarFormulario();
} else {
    $user = sanear($_REQUEST['nick']);
    $pass = sanear($_REQUEST['password']);
    if ($user == "admin" && $pass == "admin") {
        $_SESSION['sesionInciada'] = true;
        header("location: http://localhost:8080/GlobalSesiones/pantalla1.php");
    } else {
        $_SESSION['sesionInciada'] = false;
        $error = "<p style='color:red;'>Credenciales incorrectas.</p>";
        enviarFormulario();
    }
}

function enviarFormulario()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina0</title>
    </head>

    <body>
        <form action="pantalla0.php" method="post">
            <label>Login: <input type="text" name="nick"></label><br>
            <label>Pass: <input type="text" name="password"></label><br>
            <?php global $error;
            echo $error; ?>
            <input type="submit" value="Iniciar sesion" name="enviar">
        </form>
    </body>

    </html>
<?php
}

function sanear($dato)
{
    return htmlspecialchars(strip_tags(trim($dato)), ENT_QUOTES, 'UTF-8');
}

function enviarResumenError()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Credenciales Invalidas</title>
    </head>

    <body>
        <p>Identificador de la sesion:</p>
        <p>Nombre de la sesion: </p>
        <br>
        <p>Sesion iniciada:</p>
        <p>Nombre: <?php global $user;
                    echo $user ?></p>
        <p>Pass: <?php global $user;
                    echo $user ?></p>
        <p>Edad: <?php global $user;
                    echo $user ?></p>
    </body>

    </html>
<?php
}
