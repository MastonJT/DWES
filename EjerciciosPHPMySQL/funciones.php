<?php
// function unPQuery($string)
// {
//     global $connection;
//     if ($connection->query($string)) {
//         return "exito: " . str_replace(["\r\n", "\n", "\r"], "", $string);
//     } else {
//         return "fallida: " .  str_replace(["\r\n", "\n", "\r"], "", $string);
//     }
// }

function queryResult($string)
{
    global $connection;
    $query = $connection->query($string);
    if ($query) {
        return $query;
    } else {
        return "fallida: " .  str_replace(["\r\n", "\n", "\r"], "", $string);
    }
}

function clg($string)
{
    print "<script>console.log(\"{$string}\");</script>";
}

function createHTMLTableFromQuery($queryResult)
{
    $table = "<table>";
    //Creacion de la cabecera de la tabla
    $tHead = "<tr>";
    $firstRow = $queryResult->fetch(PDO::FETCH_ASSOC);
    // $columns = array_keys($firstRow);
    foreach ($firstRow as $column => $value) {
        $tHead .= "<td>$column</td>";
    }
    $tHead .= "</tr>";
    //FIN creacion cabecera
    //Creacion cuerpo tabla
    $table .= $tHead;
    foreach ($queryResult as $record) {
        $table .= "<tr>";
        foreach ($$record as $column => $value) {
            $table .= "<td>{$value}</td>";
        }
        $table .= "</tr>";
    }
    //Fin creacion cuerpo tabla
    $table .= "</table>";
    return $table;
}
function createInteractiveHTMLTableFromQuery($queryResult)
{
    if ($queryResult) {
        $table = "<form action=\"ej1.php?valor=proceso\" method=\"post\"><table>";
        $table .= "<tr><td>BORRAR</td><td>id</td><td>Nombre</td><td>Apellidos</td><td>Direccion</td><td>Telefono</td></tr>";
        foreach ($queryResult as $record) {
            $table .= "<tr><td><input type=\"checkbox\" name=\"borrables[]\" value=\"{$record["id"]}\"></td>"
                . "<td>{$record["id"]}</td><td>{$record["nombre"]}</td><td>{$record["apellidos"]}</td>" .
                "<td>{$record["direccion"]}</td><td>{$record["telefono"]}</td></tr>";
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
        <li><a href="./ej2_listadoRegistros.php">Listado</a></li>
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
        print "<p>Se ha producido un error por \n" . $e->getMessage() . "</p>";
    }
}

function validateAccess()
{
    session_start();

    if (isset($_SESSION["logIn"])) {
        return true;
    } else {
        header("location: ej2_login.php");
        exit;
    }
}

function validarSanear($dato)
{
    if ($dato == "" || preg_match("/^\s+$/", $dato)) {
        return false;
    } else {
        return htmlspecialchars(trim(strip_tags($dato)), ENT_QUOTES, "UTF-8");
    }
}

function conditionalBind($statement, $value, $column)
{
    if (empty($value)) {
        $statement->bindValue(":{$column}", null, PDO::PARAM_NULL);
    } else {
        $statement->bindValue(":{$column}", $value, PDO::PARAM_STR);
        clg("Successfuly binded {$value}");
    }
}
