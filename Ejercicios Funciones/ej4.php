<?php
    //almacenar en un array
    $arr=[];
    for ($i=1; $i <= 9; $i++) { 
        $arr[]=$_POST["v".$i];
    }
    print_r($arr);

    function calcularFila($fila){
        global $arr;
        switch ($fila) {
            case 0:$inicio=0;break;
            case 1:$inicio=3;break;
            case 2:$inicio=6;break;
            default:print "Como has llegado hasta aqui?";break;
        }
        $suma=0;
        for ($i=$inicio; $i <$inicio+2 ; $i++) { 
            $suma=$suma+$arr[$i];
        }
        print "La suma de la fila ".$fila." es: ".$suma;
        return $suma;
    }

?>