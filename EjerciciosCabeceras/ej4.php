<?php
$textoErr = "";
if (isset($_REQUEST['enviar'])) {
    $numero=sanear($_REQUEST['numero']);
    header("location:http://localhost:8080/EjerciciosCabeceras/ej41.php?numero={$numero}");
} else {
    if (!empty($_GET['error'])) {
        $textoErr = $_GET["error"];
    }
    enviarFormulario();
}

function sanear($dato) {
    return htmlspecialchars(strip_tags(trim($dato)),ENT_QUOTES,"UTF-8");
}

function enviarFormulario()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="ej4.php" method="post">
            <label for="inputNumero">Inserte numero a evaluar: <input type="number" name="numero" id="inputNumero"></label>
            <?php global $textoErr;
            echo $textoErr; ?>
            <input type="submit" value="Mandar" name="enviar">
        </form>
    </body>

    </html>
<?php
}
