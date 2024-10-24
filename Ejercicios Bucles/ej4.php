<?php
    $texto="";//contendra los dados a imprimir
    $pares=0;
    $impares=0;
    $cantDados=rand(1,10);
    for ($i=0; $i < $cantDados; $i++) { 
        $r=rand(1,6);//guarda el valor a analizar
        $dado='<image href="img/'.$r.'.svg" x='.($i*140).'></image>';
        $texto.=$dado;
        if ($r%2==0) {
            $pares++;
        }else {
            $impares++;
        }
    }
    print "<svg width 1000>".$texto."</svg>";
    print "Hay ".$pares." pares y ".$impares." impares";
    
?>