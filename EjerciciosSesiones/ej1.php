<?php
session_name("sesionEj1");
session_start();
if (isset($_SESSION['nombre']) || isset($_SESSION['clave'])) {
    imprimirFormulario();
    echo "Ya hay una sesion activa";
} elseif (isset($_REQUEST['confirmar'])) {
    if (isset($_REQUEST['nombreUsuario']) && isset(($_REQUEST['clave']))) {
        $_SESSION['nombre'] = sanear($_REQUEST['nombreUsuario']);
        $_SESSION['clave'] = sanear($_REQUEST['clave']);
        header("location: ./ej12.php");
        exit;
    } else {
        imprimirFormulario();
        print "Hay campos vacios";
    }
} else {
    imprimirFormulario();
}

function imprimirFormulario()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio session_id</title>
    </head>

    <body>
        <form action="ej1.php" method="post">
            <label>Introduzca nombre de usuario: <input type="text" name="nombreUsuario"></label>
            <label>Introduzca clave: <input type="text" name="clave"></label>
            <input type="submit" value="Confirmar" name="confirmar">
        </form>
    </body>

    </html>
<?php
}

function sanear($dato)
{
    return htmlspecialchars(strip_tags(trim($dato)), ENT_QUOTES, "UTF-8");
}
