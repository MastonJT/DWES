<?php
$errNom = "";
$errNum = "";
$nombre = $_GET['nombre'];
$numero = $_GET['numero'];
$validez = true;
if ($nombre == "") {
    $errNom = '<p>Nombre esta en blanco</p>';
    $validez = false;
}
if ($numero < 18 || $numero > 130) {
    $errNum = "<p>Numero invalido</p>";
    $validez = false;
}
if ($validez) {
    echo "Su nombre es {$nombre} y su numero es {$numero}";
} else {
    header("location: http://localhost:8080/EjerciciosCabeceras/ej5.php?errNom={$errNom}&errNum={$errNum}");
}
