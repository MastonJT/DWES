<?php //contador de pg
session_name("sesionEj2");
session_start();
$numeroPaginas;

verificarContador();
incrementarContador();
//variable session contador
function verificarContador()
{
    global $numeroPaginas;
    if (isset($_SESSION['contadorPaginas'])) {
        $numeroPaginas = intval($_SESSION['contadorPaginas']);
    } else {
        $numeroPaginas = 0;
        $_SESSION['contadorPaginas'] = 0;
    }
}

function incrementarContador()
{
    global $numeroPaginas;
    if (!isset($_REQUEST['reiniciar'])) {
        $numeroPaginas += 1;
        $_SESSION['contadorPaginas'] = $numeroPaginas;
        imprimirPagina();
    } elseif (isset($_REQUEST['enviar']) && isset($_REQUEST['reiniciar'])) {
        $numeroPaginas = 0;
        $_SESSION['contadorPaginas'] = $numeroPaginas;
        header("location: ./ej2.php");
        exit;
    } else {
        imprimirPagina();
    }
}

function imprimirPagina()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>imprimitPagina</title>
    </head>

    <body>
        <p>Numero de paginas recorridas: <?php global $numeroPaginas;
                                            echo $numeroPaginas; ?></p>
        <p>Recarga la pagina <a href="./ej2.php"> aqui</a> El contador se incrementa en 1.</p>
        <h3>Reiniciar el contador</h3>
        <form action="ej2.php" method="post">
            <label for=""><input type="checkbox" name="reiniciar" id=""> ELige esta opcion y pulsa en enviar</label>
            <input type="submit" value="enviar" name="enviar">
        </form>
        <p>Otras paginas de la sesion</p>
        <p>Pagina 2: <a href="./ej21.php">Insertar mas variables</a></p>
        <p>Pagina 3: <a href="./ej22.php">Datos de la sesion</a></p>

    </body>

    </html>
<?php
}
