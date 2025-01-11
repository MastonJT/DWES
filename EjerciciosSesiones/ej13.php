<?php
session_name("sesionEj1");
session_start();
session_unset();
setcookie(session_name(), '', time() - 500, '/');
echo "Se ha destruido la sesion";
?>
<a href="./ej1.php">Volver al inicio</a>