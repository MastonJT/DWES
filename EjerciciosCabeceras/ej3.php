<?php
$textoErr = "";
if (isset($_REQUEST['enviar'])) {
    $nom = sanear($_REQUEST['nombre']);
    if ($nom == "") {
        $textoErr = "<p style='color:red'>Nombre esta en blanco.<p/>";
        enviarFormulario();
    }elseif (!preg_match('/^[a-zàèìòùñ]*$/i',$nom)) {
        $textoErr = "<p style='color:red'>Nombre contiene caracteres invalidos.<p/>";
        enviarFormulario();
    }else {
        header("location:http://localhost:8080/EjerciciosCabeceras/ej31.php?nombre={$nom}");
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
        <title>Nombre</title>
    </head>

    <body>
        <form action="ej3.php" method="POST">
            <label for="inputNombre">Introduzca nombre: <input type="text" name="nombre" id="inputNombre"></label>
            <input type="submit" value="enviado" name="enviar">
            <?php global $textoErr;
            echo $textoErr; ?>
        </form>
    </body>

    </html>
<?php
}

function sanear($dato)
{
    return htmlspecialchars(trim(strip_tags($dato)), ENT_QUOTES, 'UTF-8');
}
