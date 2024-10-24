<?php
    $n=$_POST['ene'];
    function esPrimo($n){
    for ($i=2; $i <($n/2) ; $i++) { 
        if ($n%$i==0)
            return false;
        else 
            return true;
    }
    }
    
    if (esPrimo($n)) {
        print "$n es primo";
    }else {
        print "$n no es primo";
    }
?>