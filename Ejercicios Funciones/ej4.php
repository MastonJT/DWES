<?php
    //almacenar en un array
    $arr=[];
    for ($i=1; $i <= 9; $i++) { 
        $arr[]=$_POST["v".$i];
    }
    print_r($arr);
    $mayor=0;
    $filaMayor;

    function calcularFila($fila){
        global $arr;
        global $mayor;
        global $filaMayor;
        switch ($fila) {
            case 0:$inicio=0;break;
            case 1:$inicio=3;break;
            case 2:$inicio=6;break;
            default:print "Como has llegado hasta aqui?<br/>";break;
        }
        $suma=0;
        for ($i=$inicio; $i <=$inicio+2 ; $i++) { 
            $suma=$suma+$arr[$i];
        }
        print "<br/>La suma de la fila ".$fila." es: ".$suma;
        if ($suma>=$mayor) {
            $mayor=$suma;
            $filaMayor=$fila+1;
        }
        return $suma;
    }

    calcularFila(0);
    calcularFila(1);
    calcularFila(2);
    print "<br/>La suma mayor es $mayor y pertenece a la fila $filaMayor";
?>