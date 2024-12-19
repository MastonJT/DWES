<?php
//Pantalla de listado de registros
include "funciones.php";
validateAccess();
$err = "";

$connection = conectarBDD();
$query = "USE agenda";
$connection->query($query);
$nombre = "";
$apellido = "";

if (isset($_REQUEST['enviar'])) {
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $query = "select * from personas where nombre like ? and apellidos like ?";
    $stmt = $connection->prepare($query);
    $stmt->bindValue(1, '%' . $nombre . "%");
    $stmt->bindValue(2, '%' . $apellido . '%');
} elseif (isset($_GET['botonOrden'])) {
    $parametros = explode('-', validarSanear($_GET['botonOrden']));
    if ($parametros[1] == 'asc' || $parametros[1] == 'desc') {
        $query = "select * from personas order by $parametros[0] $parametros[1]";
        $stmt = $connection->prepare($query);
    } else {
        $err = "Orden invalido";
    }
} else {
    $query = "select * from personas";
    $stmt = $connection->prepare($query);
}

try {
    if ($stmt->execute()) {
        clg("Consulta exitosa");
        $tabla = generateSortableHTMLTableFromQuery($stmt);
        printUpperPage();
        printMenuForm();
        generateSeachForm();
        echo $tabla;
        printLowerPage();
    } else {
        $err = 'Algo ha fallado al realizar la consulta';
        echo $err;
    }
} catch (PDOException $e) {
    echo "Hubo un error " . $e->getMessage();
}

function generateSeachForm()
{
    $form = "<form action='ej3_listadoRegistros.php' method='post'>" .
        '<label for="nom">Nombre: <input type="text" name="nombre" id="nom"> </label>' .
        '<label for="ape">Apellido: <input type="text" name="apellido" id="ape"></label>' .
        '<input type="submit" value="enviar" name="enviar">' .
        '</form>';
    echo $form;
}
