<?php
$error = "";
$regex = '/\b((https?|ftp):\/{2}[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/i';
if (isset($_REQUEST['redireccionar'])) {
    $url = sanear($_REQUEST['direccion']);
    if ($url == "") {
        $error = '<p style="color:red;">La direccion eta vacia<p/>';
        enviarFormulario();
    } elseif (!preg_match($regex, $url)) {
        $error = '<p style="color:red;">La direccion tiene formato invalido<p/>';
        enviarFormulario();
    } else {
        header("location: $url");
    }
} else {
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
        <title>Pagina 1</title>
    </head>

    <body>
        <form action="ej1.php" method="post">
            <label for="urele">Direccion: <input type="text" name="direccion" id="urele"></label>
            <input type="submit" value="Redireccionar" name="redireccionar">
            <?php global $error;
            echo $error; ?>
        </form>
    </body>

    </html>
<?php
}

function sanear($datos)
{
    return htmlspecialchars(trim(strip_tags($datos)), ENT_QUOTES, 'UTF-8');
}
