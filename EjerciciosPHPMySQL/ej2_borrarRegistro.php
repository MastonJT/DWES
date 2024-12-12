<?php

use function PHPSTORM_META\map;

validateAccess();
$err = "";

$connection = conectarBDD();
$query = "USE agenda";
$connection->query($query);


if (isset($_REQUEST["enviar"])) {
    if (isset($_REQUEST["borrar"]) && !empty($_REQUEST['borrar'])) {
        $datos = array_map('validarSanear', $datos);
    } else {
        $err = 'No se han seleccionado registros para borrar';
        printUpperPage();
        printMenuForm();
        echo $err;
        printLowerPage();
    }
} else {
    $query = "select * from personas";
    $stmt = $connection->prepare($query);
    if ($stmt->execute()) {
        clg("Consulta exitosa");
        $tabla = generateInteractiveHTMLTableFromQuery($stmt);
        printUpperPage();
        printMenuForm();
        echo $tabla;
        printLowerPage();
    } else {
        $err = 'Algo ha fallado al realizar la consulta';
        printUpperPage();
        printMenuForm();
        echo $err;
        printLowerPage();
    }
}
