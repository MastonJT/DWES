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

    //verificar si ya existe la persona
    $query = "SELECT * FROM personas WHERE nombre = :nombre AND apellidos = :apellidos AND direccion = :direccion AND telefono = :telefono";
    $queryVerfPersona = $connection->prepare($query);
    conditionalBind($queryVerfPersona, $nombre, "nombre");
    conditionalBind($queryVerfPersona, $apellidos, "apellidos");
    conditionalBind($queryVerfPersona, $direccion, "direccion");
    conditionalBind($queryVerfPersona, $telefono, "telefono");
    if ($queryVerfPersona->execute()) {
        clg("Verificacion exitosa de persona");
        $row = $queryVerfPersona->fetch(PDO::FETCH_ASSOC);
        if ($row == false) {
            //SI NO HAY REGISTROS SE PROCEDE A INSERTAR
            $query = "INSERT INTO personas(nombre,apellidos,direccion,telefono) VALUES(:nombre,:apellidos,:direccion,:telefono)";
            $queryInsercionPersona = $connection->prepare($query);
            try {
                conditionalBind($queryInsercionPersona, $nombre, "nombre");
                conditionalBind($queryInsercionPersona, $apellidos, "apellidos");
                conditionalBind($queryInsercionPersona, $direccion, "direccion");
                conditionalBind($queryInsercionPersona, $telefono, "telefono");
                if ($queryInsercionPersona->execute()) {
                    $err = "Insercion realizada con exito";
                } else {
                    $err = "Ejecucion fallida. Compruebe los datos.";
                }
            } catch (PDOException $e) {
                $err = "Error " . $e->getMessage();
            }
        } else {
            $err = "Ya existe el registro";
        }
    } else {
        clg("No se pudo verificar la persona");
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
