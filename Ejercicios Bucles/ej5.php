<?php
    $valorInicial=$_POST['valorInicial'];
    $incremento=$_POST['incremento'];
    $numeroValores=$_POST['numeroValores'];
    $texto="";
    if ($numeroValores<0) {
        echo "El número de valores no puede ser negativo.";
    }else {
        for ($i=0; $i <$numeroValores ; $i++) { 
            $texto.=($valorInicial+$incremento*$i).", ";
        }
        echo "Los valores son ".$texto;
    }
?>