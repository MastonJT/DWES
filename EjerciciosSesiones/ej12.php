<?php
session_name("sesionEj1");
session_start();
if (!isset($_REQUEST['salir'])) {
    if (isset($_SESSION['nombre']) && isset($_SESSION['clave'])) {
        $nombre = $_SESSION['nombre'];
        $clave = $_SESSION['clave'];
        echo "Los datos de sesion son " . $nombre . " y " . $clave . "\nSe va a proceder a su eliminacion.";
        // session_destroy();
?>
        <form action="ej12.php" method="post">
            <button type="submit" name="salir">Salir</button>
        </form>
<?php
    } else {
        header("location: ./ej1.php");
        exit;
    }
} else {
    header("location: ej13.php");
}
