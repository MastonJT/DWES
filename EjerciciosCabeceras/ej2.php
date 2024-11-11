<?php
$textoError = "";
if (isset($_REQUEST['entrar'])) {
    $pass = sanear($_REQUEST['contrasena']);
    if ($pass == "") {
        $textoError = "<p style='color:red'>Contrasena en blanco.<p/>";
        enviarFormulario();
    } elseif (!preg_match('/z80/', $pass)) {
        $textoError = "<p style='color:red'>Contrasena incorrecta.<p/>";
        enviarFormulario();
    } else {
        header("location: http://localhost:8080/EjerciciosCabeceras/ej21.php");
    }
} else {
    //enviar forumlario
    enviarFormulario();
}

function enviarFormulario()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ej2</title>
    </head>

    <body>
        <form action="ej2.php" method="post">
            <label for="inputContrasena">Introduzca la contrasena: <input type="password" name="contrasena" id="inputContrasena"></label>
            <?php global $textoError;
            echo $textoError; ?>
            <input type="submit" value="entrar" name="entrar">
        </form>
    </body>

    </html>
<?php
}

function sanear($dato)
{
    return htmlspecialchars(trim(strip_tags($dato)), ENT_QUOTES, 'UTF-8');
}
