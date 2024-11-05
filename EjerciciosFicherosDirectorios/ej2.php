<?php
$archivo = 'contador.txt';

// Leer contador actual
if (file_exists($archivo)) {
    $cuenta = file_get_contents($archivo);
} else {
    $cuenta = 0;
}
$cuentaNueva = intval($cuenta) + 1;

//guardar valor nuevo, si no exite se crea y se guarda
file_put_contents($archivo, $cuentaNueva);

// Display the current count
echo "Contador: " . $cuentaNueva;
?>