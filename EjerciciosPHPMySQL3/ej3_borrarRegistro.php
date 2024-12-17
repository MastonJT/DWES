<?php
include "funciones.php";

validateAccess();
$err = "";

$connection = conectarBDD();
$query = "USE agenda";
$connection->query($query);


if (isset($_REQUEST["enviar"])) {
    if (isset($_REQUEST["borrar"]) && !empty($_REQUEST['borrar'])) {
        $datos = $_REQUEST['borrar'];
        $datos = array_map('validarSanear', $datos);
        //Proceso de borrado
        $query = "DELETE FROM personas WHERE id=?";
        foreach ($datos as $key => $value) {
            $stmt = $connection->prepare($query);
            // conditionalBindSingle($stmt, $value);
            if ($stmt->execute([$value])) {
                $err .= "Borrado exitoso de $key, $value<br/>";
            } else {
                $err .= "Algo salio mal al borrar $key, $value<br/>";
            }
        }
    } else {
        $err = 'No se han seleccionado registros para borrar';
    }
} else {
    $query = "select * from personas";
    $stmt = $connection->prepare($query);
    if ($stmt->execute()) {
        clg("Consulta exitosa");
        $err = generateInteractiveHTMLTableFromQuery($stmt);
    } else {
        $err = 'Algo ha fallado al realizar la consulta';
    }
}

printUpperPage();
printMenuForm();
echo $err;
printLowerPage();
