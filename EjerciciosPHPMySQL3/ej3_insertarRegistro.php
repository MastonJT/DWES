<?php
//Pantalla de insertar codigos
include "funciones.php";
validateAccess();

$err = "";

if (isset($_REQUEST['enviar'])) {
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];

    $connection = conectarBDD();
    $query = "USE agenda";
    $connection->query($query);

    //verificar si ya existe la persona
    $query = "SELECT * FROM personas WHERE nombre = :nombre AND apellidos = :apellidos";
    $queryVerfPersona = $connection->prepare($query);
    conditionalBind($queryVerfPersona, $nombre, "nombre");
    conditionalBind($queryVerfPersona, $apellidos, "apellidos");
    if ($queryVerfPersona->execute()) {
        clg("Verificacion exitosa de persona");
        $row = $queryVerfPersona->fetch(PDO::FETCH_ASSOC);
        if ($row == false) {
            //SI NO HAY REGISTROS SE PROCEDE A INSERTAR
            $query = "INSERT INTO personas(nombre,apellidos) VALUES(:nombre,:apellidos)";
            $queryInsercionPersona = $connection->prepare($query);
            try {
                conditionalBind($queryInsercionPersona, $nombre, "nombre");
                conditionalBind($queryInsercionPersona, $apellidos, "apellidos");
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
    <form action="ej3_insertarRegistro.php" method="post">
        <label for="nom">Nombre: <input type="text" name="nombre" id="nom"></label><br>
        <label for="ape">Apellidos: <input type="text" name="apellidos" id="ape"></label><br>
        <?php global $err;
        echo $err; ?>
        <input type="submit" value="Enviar" name="enviar">
    </form>
<?php
}
