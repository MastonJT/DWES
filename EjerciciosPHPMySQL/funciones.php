<?php
function unPQuery($string)
{
    global $connection;
    if ($connection->query($string)) {
        return "exito: " . str_replace(["\r\n", "\n", "\r"], '', $string);
    } else {
        return "fallida: " .  str_replace(["\r\n", "\n", "\r"], '', $string);
    }
}

function pQuery($string)
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
        $table .= "<tr><td>{$registry['ID']}</td><td>{$registry['nombre']}</td><td>{$registry['localidad']}</td></tr>";
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
            $table .= "<tr><td><input type=\"checkbox\" name=\"borrables[]\" value=\"{$registry['ID']}\"></td><td>{$registry['ID']}</td><td>{$registry['nombre']}</td><td>{$registry['localidad']}</td></tr>";
        }
        $table .= "</table><input type=\"submit\" value=\"Enviar\" name=\"enviar\"></form>";
        return $table;
    } else {
        return "Parametro nulo en createInteractiveHTMLTableFromQuery";
    }
}
