<?php
include "funciones.php";
session_start();
$connection;
$links;
$RESULT;

if (isset($_SESSION['logIn'])) {
    if (!isset($_GET['valor'])) {
        $links = "
        <a href='ej1.php?valor=conectar'>Conectar y crear la BDD y la tabla.</a>
        <a href='ej1.php?valor=borrar'>Borrar registros</a>";
        printMainPage();
    } elseif (isset($_GET['valor']) && $_GET['valor'] == "conectar") {
        $links = "
        <a href='ej1.php'>Volver a la pagina inicial.</a>";
        $connection = conectarBDD();
        //CREAR BASE Y USAR
        clg(unPQuery('DROP database IF EXISTS db1'));
        clg(unPQuery('CREATE database db1'));
        clg(unPQuery('USE db1'));
        //CREAR tabla
        clg(unPQuery("CREATE TABLE tabla1(
        ID int primary key,
        nombre varchar(100),
        localidad varchar(100)
        )"));
        //insertar la tabla
        clg(unPQuery("INSERT INTO tabla1 (ID, nombre, localidad) VALUES
        (23, 'Jose', 'MOSTOLES'),
        (24, 'jaime', 'MOSTOLES'),
        (25, 'jesus', 'MOSTOLES'),
        (26, 'geronimo', 'MOSTOLES'),
        (27, 'JUAN', 'MOSTOLES'),
        (28, 'MARIA', 'VILLAVICIOSA')"));
        //QUERY A LA TABLA
        $RESULT = pQuery('SELECT * FROM tabla1');
        //mostrar pagina
        printUpperPage();
        print(createHTMLTableFromQuery($RESULT));
        printLowerPage();
    } elseif (isset($_GET['valor']) && $_GET['valor'] == "borrar") {
        $links = "<a href='ej1.php'>Volver a la pagina inicial.</a>";
        $connection = conectarBDD();
        clg(unPQuery('USE db1'));
        printUpperPage();
        $RESULT = pQuery('SELECT * FROM tabla1');
        print(createInteractiveHTMLTableFromQuery($RESULT));
        printLowerPage();
    } elseif (isset($_REQUEST['enviar'])) {
        $links = "
        <a href='ej1.php'>Volver a la pagina inicial.</a>";
        $connection = conectarBDD();
        clg(unPQuery('USE db1'));
        $elementosABorrar = $_REQUEST['borrables'];
        foreach ($elementosABorrar as $elemento) {
            clg(unPQuery("delete from tabla1 where ID={$elemento}"));
        }
        $RESULT = pQuery('SELECT * FROM tabla1');
        printUpperPage();
        print(createHTMLTableFromQuery($RESULT));
        printLowerPage();
    }
} else {
    header("Location: ej2.php");
    exit;
}



function printMainPage()
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
    </body>

    </html>
<?php
}
