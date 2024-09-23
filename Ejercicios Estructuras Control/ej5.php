<?php
    #jugador1
    $r1=rand(1,6);
    $r2=rand(1,6);
    $r3=rand(1,6);
    $dado1=file_get_contents("img/".$r1.".svg");
    $dado2=file_get_contents("img/".$r2.".svg");
    $dado3=file_get_contents("img/".$r3.".svg");
    print "JUGADOR 1<br/>".$dado1.$dado2.$dado3."<br/>";
    #jugador2
    $r4=rand(1,6);
    $r5=rand(1,6);
    $r6=rand(1,6);
    $dado4=file_get_contents("img/".$r4.".svg");
    $dado5=file_get_contents("img/".$r5.".svg");
    $dado6=file_get_contents("img/".$r6.".svg");
    print "JUGADOR 2<br/>".$dado4.$dado5.$dado6."<br/>";
    #variables valorMax
    $j1v=$r1+$r2+$r3;
    $j2v=$r4+$r5+$r6;
    $texto;
    if (($r1==$r2&&$r2==$r3)&&($r4==$r5&&$r5==$r6)&&($r1==$r4)) {#empate de trios
        $texto="Ha habido empate de trios.";
    }
    elseif (($r1==$r2&&$r2==$r3)&&($r4==$r5&&$r5==$r6)&&($r1>$r4)) {#trio mayor J1
        $texto="Gana jugador 1 por trio mayor.";
    }
    elseif (($r1==$r2&&$r2==$r3)&&($r4==$r5&&$r5==$r6)&&($r1<$r4)) {#trio mayor J2
        $texto="Gana jugador 2 por trio mayor.";
    }
    elseif (($r1==$r2||$r2==$r3||$r3==$r1)<=($r4==$r5&&$r5==$r6)) {#pareja mahor J1
        $texto="Gana jugador 2 por pareja mayor.";
    }
    print $texto;
?>