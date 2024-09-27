<?php
    $A=$_POST['AAAA'];
    $B=$_POST['BBBB'];
    $C=$_POST['CCCC'];
    $discriminante=pow($B,2)+4*$A*$C;
    //-b+-sqrt(b2-4ac)/2a
    if ($discriminante<0) {
        echo 'No existe solucion porque el discriminante es negativo: '.$discriminante;
    }else {
        $r1=(-$B+sqrt($discriminante))/(2*$A);
        $r2=(-$B-sqrt($discriminante))/(2*$A);
        echo 'Soluciones: '.$r1.' y '.$r2;
    }
?>