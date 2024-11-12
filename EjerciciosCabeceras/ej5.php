<?php
$errorNum = "";
$errorNom = "";
if (isset($_REQUEST['enviar'])) {
    //hacer cosas
    $nombre=sanear($_REQUEST['nombre']);
    $numero=sanear($_REQUEST['numero']);
    header("location: http://localhost:8080/EjerciciosCabeceras/ej51.php?nombre={$nombre}&numero={$numero}");
} else {
    if (!empty($_GET['errNom'])) {
        $errorNom=$_GET['errNom'];
    }
    if (!empty($_GET['errNum'])) {
        $errorNum=$_GET['errNum'];
    }
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
        <title>Document</title>
        <style>
            p{
                color: red;
            }
            form{
                display: flex;
                flex-direction: column;
            }
        </style>
    </head>

    <body>
        <form action="ej5.php">
            <label for="inputNumero">Numero: <input type="number" name="numero" id="inputNumero"></label>
            <?php global $errorNum; echo $errorNum;?>
            <label for="inputNombre">Nombre: <input type="text" name="nombre" id="inputNombre"></label>
            <?php global $errorNom; echo $errorNom;?>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    </body>

    </html>
<?php
}

function sanear($dato) {
    return htmlspecialchars(strip_tags(trim($dato)),ENT_QUOTES,'UTF-8');
}
