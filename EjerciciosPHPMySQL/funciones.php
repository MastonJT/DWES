<?php
// function unPQuery($string)
// {
//     global $connection;
//     if ($connection->query($string)) {
//         return "exito: " . str_replace(["\r\n", "\n", "\r"], '', $string);
//     } else {
//         return "fallida: " .  str_replace(["\r\n", "\n", "\r"], '', $string);
//     }
// }

function queryResult($string)
{
    global $connection;
    $query = $connection->query($string);
    if ($query) {
        return $query;
    } else {
        return "fallida: " .  str_replace(["\r\n", "\n", "\r"], '', $string);
    }
}

function clg($string)
{
    print "<script>console.log(\"{$string}\");</script>";
}

function createHTMLTableFromQuery($queryResult)
{
    $table = "<table>";
    $table .= "<tr><td>ID</td><td>Nombre</td><td>Localidad</td></tr>";
    foreach ($queryResult as $registry) {
        $table .= "<tr><td>{$registry['ID']}</td>" .
            "<td>{$registry['nombre']}</td>" .
            "<td>{$registry['localidad']}</td></tr>";
    }
    $table .= "</table>";
    return $table;
}
function createInteractiveHTMLTableFromQuery($queryResult)
{
    if ($queryResult) {
        $table = "<form action=\"ej1.php?valor=proceso\" method=\"post\"><table>";
        $table .= "<tr><td>BORRAR</td><td>ID</td><td>Nombre</td><td>Localidad</td></tr>";
        foreach ($queryResult as $registry) {
            $table .= "<tr><td><input type=\"checkbox\" name=\"borrables[]\" value=\"{$registry['ID']}\"></td>"
                . "<td>{$registry['ID']}</td><td>{$registry['nombre']}</td><td>{$registry['localidad']}</td></tr>";
        }
        $table .= "</table><input type=\"submit\" value=\"Enviar\" name=\"enviar\"></form>";
        return $table;
    } else {
        return "Parametro nulo en createInteractiveHTMLTableFromQuery";
    }
}

function printUpperPage()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina principal</title>
    </head>

    <body>
        <?php global $links;
        echo $links; ?>
    <?php
}

function printLowerPage()
{
    ?>
    </body>

    </html>
<?php
}

function printMenuForm()
{
?>
    <ul>
        <li><a href="./ej2_insertarRegistro.php">Insertar Registros</a></li>
        <li><a href="./ej2_2.php">Listado</a></li>
        <li><a href="./ej2_3.php">Borrar un Registro</a></li>
    </ul>
<?php
}

function conectarBDD()
{
    try {
        $conection = new PDO("mysql:host=localhost:3306;charset=utf8", "root", "");
        $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conection;
    } catch (PDOException $e) {
        print '<p>Se ha producido un error por \n' . $e->getMessage() . '</p>';
    }
}

function validateAccess()
{
    session_start();

    if (isset($_SESSION['logIn'])) {
        return true;
    } else {
        header("location: ej2_login.php");
        exit;
    }
}
