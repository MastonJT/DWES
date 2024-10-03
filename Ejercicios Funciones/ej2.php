<?php
    $numero=$_POST['numero'];

    function factorizar(&$numero){
        $cociente=2;
        $arrFactores=[];
        while ($numero!=1) {
            if ($numero%$cociente==0) {
                $arrFactores[]=$cociente;
                $numero=$numero/$cociente;
            }else {
                $cociente++;
            }
        }
        print "Los factores son: ";
        print_r($arrFactores);
    }
    
    factorizar($numero);
    
?>