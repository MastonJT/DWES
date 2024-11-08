<?php
$archivo = 'contador.txt';

// Leer contador actual
if (file_exists($archivo)) {
    $flujoLectura=fopen($archivo,"r") or die("No se pudo leer el fichero");
    $cuenta = fread($flujoLectura,filesize($archivo));
    fclose($flujoLectura);
} else {//Sino inicializar a 0
    $cuenta = 0;
}
//actualizar cuenta
$cuenta = intval($cuenta) + 1;

//proceso de escritura
$flujoEscritura=fopen($archivo,"w");
fwrite($flujoEscritura,$cuenta);

//Mostrar la cuenta actual
echo "Contador: " . $cuenta;
?>