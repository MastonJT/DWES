<?php
$longitud=rand(5,15);
print "Número de indices: ".$longitud;
for ($i=0; $i<$longitud;$i++) {
    $matriz[]=rand(0,10);
}
print "<pre>";print_r($matriz);print "</pre>";
?>