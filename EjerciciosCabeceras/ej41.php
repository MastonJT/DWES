<?php
//validar numero
$numero=intval($_GET['numero']);
if ($numero<=139&&$numero>=18) {
    echo "su numero es {$numero}";
}else {
    $error="<p style='color:red;'>Valor invalido<p/>";
    header("location:http://localhost:8080/EjerciciosCabeceras/ej4.php?error={$error}");
}