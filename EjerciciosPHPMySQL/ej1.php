<?php
$connection;
$links;
if (!isset($_GET['valor'])) {
    $links = "
        <a href='ej1.php?valor=conectar'>Conectar y crear la BDD y la tabla.</a>
        <a href='ej1.php?valor=borrar'>Borrar registros</a>";
    printMainPage();
} elseif (isset($_GET['valor']) && $_GET['valor'] == "conectar") {
    $links = "
        <a href='ej1.php'>Volver a la pagina inicial.</a>";
    $connection = conectarBDD();
    $conection->query('CREATE SCHEMA db1');
    //CREAR tabla
    $qParam = '';
    printMainPage();
} elseif (isset($_GET['valor']) && $_GET['valor'] == "borrar") {
    $links = "
        <a href='ej1.php'>Volver a la pagina inicial.</a>";
    printMainPage();
}

function conectarBDD()
{
    try {
        $conection = new PDO("mysql:host=localhost:3306;charset=utf8", "root", "");
        $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conection;
    } catch (PDOException $e) {
        print '<p>Se ha producido un error por \n' . $e->getMessage() . '</p>';
    }
}

function unPQuery($string)
{
    global $connection;
    if ($connection->query($string)) {
        return "Querry existosa: " . $string;
    } else {
        return "Querry fallida: " . $string;
    }
}
function pQuery($string)
{
    global $connection;
    $query = $connection->query($string);
    if ($query) {
        return $query;
    } else {
        return "Querry fallida: " . $string;
    }
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
