<?php
    $rand1=rand(1,6);
    $rand2=rand(1,6);
    $dado1=file_get_contents("img/".$rand1.".svg");
    $dado2=file_get_contents("img/".$rand2.".svg");
    print $dado1.$dado2."<br/>";
    if ($rand1>$rand2) {
        print "No hay pareja. El valor mas alto es de ".$rand1;
    }else if ($rand2>$rand1){
        print "No hay pareja. El valor mas alto es de ".$rand2;
    }else {
        print "Ha sacado pareja de ".$rand1;
    }

?>