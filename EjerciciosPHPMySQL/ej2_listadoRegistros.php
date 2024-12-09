<?php
//Pantalla de listado de registros
include "funciones.php";
validateAccess();
$err = "";

$connection = conectarBDD();
$query = "USE agenda";
$connection->query($query);

$query = "select * from personas";
$stmt = $connection->prepare($query);

if ($stmt->execute()) {
    clg("Consulta exitosa");
    $rows = $stmt->fetchAll();
    if ($rows == false) {
        $err = "No hay valores registrados.";
        echo $err;
    } else {
        $tabla = createHTMLTableFromQuery($stmt);
        printUpperPage();
        printMenuForm();
        echo $tabla;
        printLowerPage();
    }
} else {
    $err = 'Algo ha fallado al realizar la consulta';
    echo $err;
}
