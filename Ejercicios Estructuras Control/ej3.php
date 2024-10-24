<?php
    #jugador1
    $rand1=rand(1,6);
    $rand2=rand(1,6);
    $dado1=file_get_contents("img/".$rand1.".svg");
    $dado2=file_get_contents("img/".$rand2.".svg");
    print "JUGADOR 1<br/>".$dado1.$dado2."<br/>";
    #jugador2
    $rand3=rand(1,6);
    $rand4=rand(1,6);
    $dado3=file_get_contents("img/".$rand3.".svg");
    $dado4=file_get_contents("img/".$rand4.".svg");
    print "JUGADOR 2<br/>".$dado3.$dado4."<br/>";
    #proceso
    $texto;
    #ver si ambos tienen pareja
    if ($rand1==$rand2&&$rand3==$rand4) {
        if ($rand1>$rand3) {#gana 1 por pareja mayor
            $texto="Ha habido parejas. Gana el jugador 1 por pareja mayor.";
        }else if($rand3>$rand1){#gana 2 por pareja mayor
            $texto="Ha habido parejas. Gana el jugador 2 por pareja mayor.";
        }else {#empate por parejas iguales
            $texto="Ha habido empate, no gana nadie.";
        }
    }else if ($rand1==$rand2&&$rand3!=$rand4) {#Jugador 1 tiene pareja pero 2 no
        $texto="Gana jugador 1 por pareja.";
    }else if ($rand1!=$rand2&&$rand3==$rand4) {#Jugador 2 tiene pareja pero 1 no
        $texto="Gana jugador 2 por pareja.";
    }else if (($rand1+$rand2)>$rand3+$rand4) {#Jugador 1 tiene mas puntuacion
        $texto="Gana jugador 1 por puntuación.";
    }else if (($rand1+$rand2)<($rand3+$rand4)) {#jugador 2 tiene mas puntuacion
        $texto="Gana jugador 2 por puntuación.";
    }else {                                     #Empate por puntuaciones iguales
        $texto="Ha habido empate por puntuación.";
    }
    print $texto;
?>