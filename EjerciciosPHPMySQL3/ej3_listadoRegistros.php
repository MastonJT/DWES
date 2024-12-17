<?php
//Pantalla de listado de registros
include "funciones.php";
validateAccess();
$err = "";

$connection = conectarBDD();
$query = "USE agenda";
$connection->query($query);

if (isset($_GET['botonOrden'])) {
    $parametros = explode('-', $_GET['botonOrden']);
    $query = "select * from personas order by $parametros[0] $parametros[1]";
} else {
    $query = "select * from personas";
}

$stmt = $connection->prepare($query);

if ($stmt->execute()) {
    clg("Consulta exitosa");
    $tabla = generateSortableHTMLTableFromQuery($stmt);
    printUpperPage();
    printMenuForm();
    echo $tabla;
    printLowerPage();
} else {
    $err = 'Algo ha fallado al realizar la consulta';
    echo $err;
}
