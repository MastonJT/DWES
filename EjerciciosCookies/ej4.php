<?php
$texto = "";
switch (true) {
    case isset($_REQUEST['crear']):
        if (isset($_REQUEST['galletinha'])) {
            $texto = "Ya hay una cookie activa. Espera a que expire";
            imprimirFormulario();
        } else {
            setcookie("galletinha", time() + intval($_REQUEST['duracion']), time() + intval($_REQUEST['duracion']));
            $texto = "Se ha creado la cookie, se destruira en " . $_REQUEST['duracion'] . "segundos";
            imprimirFormulario();
        }
        break;
    case isset($_REQUEST['comprobar']):
        if (isset($_COOKIE['galletinha'])) {
            $texto = "La cookie se destruir'a en " . $duracion = $_COOKIE["galletinha"] - time();
            imprimirFormulario();
        } else {
            $texto = "No hay ninguna cookie activa";
            imprimirFormulario();
        }
        break;
    case isset($_REQUEST['destruir']):
        if (isset($_COOKIE['galletinha'])) {
            setcookie("galletinha");
            $texto = "Se ha destruido la cookie";
            imprimirFormulario();
        } else {
            $texto = "No hay ninguna cookie activa";
            imprimirFormulario();
        }
        break;
    default:
        imprimirFormulario();
        break;
}
function imprimirFormulario()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ej4</title>
    </head>

    <body>
        <form action="ej4.php" method="post">
            <?php global $texto;
            echo $texto . "<br/>"; ?>
            Elija una opcion
            <ul>
                <li>Crear una cookie con una duracion de <input type="number" name="duracion" id="" min="0" max="60"> segundos. <button type="submit" name="crear">Crear</button></li>
                <li>Comprobar la cookie <button type="submit" name="comprobar">Comprobar</button></li>
                <li>Destruir la cookie <button type="submit" name="destruir">Destruir</button></li>
            </ul>
        </form>
    </body>

    </html>
<?php
}
