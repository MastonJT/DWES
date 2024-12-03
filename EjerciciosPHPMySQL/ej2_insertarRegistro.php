<?php
//Pantalla de insertar codigos
include "funciones.php";
validateAccess();

$err = "";

if (isset($_REQUEST['enviar'])) {
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $direccion = $_REQUEST['direccion'];
    $telefono = $_REQUEST['telefono'];

    $connection = conectarBDD();
    $query = "USE agenda";
    $connection->query($query);

    $query = "INSERT INTO peronas(nombre,apellidos,direccion,telefono) VALUES(:nombre,:apellidos,:direccion,:telefono)";
    $queryInsercionPersona = $connection->prepare($query);
    $queryInsercionPersona->bindValue(':nombre', $nombre);
    $queryInsercionPersona->bindValue(':apellidos', $apellidos);
    $queryInsercionPersona->bindValue(':direccion', $direccion);
    $queryInsercionPersona->bindValue(':telefono', $telefono);

    $resultado = $queryInsercionPersona->execute();
    if ($resultado) {
        $err = "Insercion realizada con exito";
    } else {
        $err = "Datos invalidos";
    }
}

printUpperPage();
printMenuForm();
printNewRegistryForm();
printLowerPage();

function printNewRegistryForm()
{
?>
    <form action="ej2_insertarRegistro.php" method="post">
        <label for="nom">Nombre: <input type="text" name="nombre" id="nom"></label><br>
        <label for="ape">Apellidos: <input type="text" name="apellidos" id="ape"></label><br>
        <label for="dir">Direccion: <input type="text" name="direccion" id="dir"></label><br>
        <label for="tel">Telefono: <input type="text" name="telefono" id="tel"></label><br>
        <?php global $err;
        echo $err; ?>
        <input type="submit" value="Enviar" name="enviar">
    </form>
<?php
}
