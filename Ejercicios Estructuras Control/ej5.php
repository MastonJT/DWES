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
    if (($r1==$r2&&$r2==$r3)&&($r4==$r5&&$r5==$r6)) {#ambos tienen trio
        if ($r1>$r4) {#trio mayor J1
            $texto="Gana jugador 1 por trio mayor.";
        } elseif ($r1<$r4) {#trio mayor J2
            $texto="Gana jugador 2 por trio mayor.";
        } else{#empate de trios
            $texto="Ha habido empate de trios.";
        }
    }#jugador 1 tiene trio pero 2 no
    elseif (($r1==$r2&&$r2==$r3)&&!($r4==$r5&&$r5==$r6)) {
        $texto="Gana jugador 1 por trio.";
    }#jugador 2 tiene trio pero 1 no
    elseif (!($r1==$r2&&$r2==$r3)&&($r4==$r5&&$r5==$r6)) {
        $texto="Gana jugador 2 por trio.";
    }#ambos tienen alguna pareja
    elseif (($r1==$r2||$r2==$r3||$r3==$r1)&&($r4==$r5||$r5==$r6||$r6==$r4)) {
        #extraer las parejas en variables
        if ($r1==$r2) {#j1
            $p1=$r1;
        }elseif ($r2==$r3) {
            $p1=$r2;
        }elseif ($r3==$r1) {
            $p1=$r3;
        }#j2
        if ($r4==$r5) {#j1
            $p2=$r4;
        }elseif ($r5==$r6) {
            $p2=$r5;
        }elseif ($r6==$r4) {
            $p2=$r6;
        }#comprar parejas
        if ($p1>$p2) {#j1 par mayor
            $texto="Gana jugador 1 por pareja mayor.";
        }elseif ($p1<$p2) {#j2 par mayor
            $texto="Gana jugador 2 por pareja mayor.";
        }else {#parejas iguales
            if ($j1v>$j2v) {
                $texto="Gana jugador 1 por puntuación.";
            }elseif ($j1v<$j2v) {
                $texto="Gana jugador 2 por puntuación.";
            }else {
                $texto="Empate por puntuación.";
            }
        }
        
    }elseif(($r1==$r2||$r2==$r3||$r3==$r1)&&!($r4==$r5||$r5==$r6||$r6==$r4)){#j1 tiene pareja pero 2 no
        $texto="Gana jugador 1 por pareja.";
    }elseif(!($r1==$r2||$r2==$r3||$r3==$r1)&&($r4==$r5||$r5==$r6||$r6==$r4)){#j2 tiene pareja pero 1 no
        $texto="Gana jugador 2 por pareja.";
    }else {#no hay ni pareja ni trio
        if ($j1v>$j2v) {    
            $texto="Gana jugador 1 por puntuación.";
        }elseif ($j1v<$j2v) {
            $texto="Gana jugador 2 por puntuación.";
        }else {
            $texto="Empate por puntuación.";
        }
    }
    print $texto;
?>