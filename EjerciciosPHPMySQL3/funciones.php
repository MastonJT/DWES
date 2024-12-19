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

function generateHTMLTableFromQuery($data) //donde data es un statement ejecutado
{
    //No queremos columnas duplicadas
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($data)) {
        // header
        $html = '<table><thead><tr>';
        foreach (array_keys($data[0]) as $column) {
            $html .= "<th>$column</th>";
        }
        $html .= '</tr></thead>';
        // body
        $html .= '<tbody>';
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= "<td>$cell</td>";
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
    } else {
        $html = '<p>No hay datos</p>';
    }
    $html .= '</table>';
    return $html;
}

function generateSortableHTMLTableFromQuery($data) //donde data es un statement ejecutado
{
    //No queremos columnas duplicadas
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($data)) {
        // header
        $html = '<form><table><thead><tr>';
        foreach (array_keys($data[0]) as $column) {
            $html .= "<th><button type='submit' value='{$column}-asc' name='botonOrden'>↑</button>$column<button type='submit' value='{$column}-desc' name='botonOrden'>↓</button></th>";
        }
        $html .= '</tr></thead>';
        // body
        $html .= '<tbody>';
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= "<td>$cell</td>";
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
    } else {
        $html = '<p>No hay registros</p>';
    }
    $html .= '</table></form>';
    return $html;
}

function generateInteractiveSortableHTMLTableFromQuery($data) //donde data es un statement ejecutado
{ //esta tabla permite eliminar registros y ordenarlos
    //No queremos columnas duplicadas
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($data)) {
        // header
        $html = '<form action="ej3_borrarRegistro.php" method="GET">' .
            '<table>' .
            '<thead>' .
            '<tr>';
        //cabeceras de columnas
        foreach (array_keys($data[0]) as $column) {
            $html .= "<th><button type='submit' value='{$column}-asc' name='botonOrden'>↑</button>$column<button type='submit' value='{$column}-desc' name='botonOrden'>↓</button></th>";
        }
        $html .= "<th>Borrar</th>" .
            '</tr></thead>';
        // body
        $html .= '<tbody>';
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= "<td>$cell</td>";
            }
            $html .= "<td><input type='checkbox' name='borrar[]' value=\"{$row['id']}\"></td></tr>";
        }
        $html .= '</tbody>';
        $html .= '</table>' .
            '<input type="submit" value="Enviar" name="enviar"/>' .
            '</form>';
    } else {
        $html = '<p>No hay datos</p>';
    }
    return $html;
}
function generateInteractiveHTMLTableFromQuery($data) //donde data es un statement ejecutado
{ //esta tabla permite eliminar registros
    //No queremos columnas duplicadas
    $data = $data->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($data)) {
        // header
        $html = '<form action="ej3_borrarRegistro.php" method="POST">' .
            '<table>' .
            '<thead>' .
            '<tr>';
        foreach (array_keys($data[0]) as $column) {
            $html .= "<th>$column</th>";
        }
        $html .= "<th>Borrar</th>" .
            '</tr></thead>';
        // body
        $html .= '<tbody>';
        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= "<td>$cell</td>";
            }
            $html .= "<td><input type='checkbox' name='borrar[]' value=\"{$row['id']}\"></td></tr>";
        }
        $html .= '</tbody>';
        $html .= '</table>' .
            '<input type="submit" value="Enviar" name="enviar"/>' .
            '</form>';
    } else {
        $html = '<p>No hay datos</p>';
    }
    return $html;
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
        <li><a href="./ej3_insertarRegistro.php">Insertar Registros</a></li>
        <li><a href="./ej3_listadoRegistros.php">Listado y Busqueda</a></li>
        <li><a href="./ej3_borrarRegistro.php">Borrar un Registro</a></li>
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
        header("location: ej3_login.php");
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

function conditionalBind($statement, $value, $column) //hace bind null si esta vacio
{
    if (empty($value)) {
        $statement->bindValue(":{$column}", null, PDO::PARAM_NULL);
    } else {
        $statement->bindValue(":{$column}", $value, PDO::PARAM_STR);
        clg("Successfuly binded {$value}");
    }
}
