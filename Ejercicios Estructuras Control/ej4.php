<?php
    $r1=rand(1,6);
    $r2=rand(1,6);
    $r3=rand(1,6);
    $dado1=file_get_contents("img/".$r1.".svg");
    $dado2=file_get_contents("img/".$r2.".svg");
    $dado3=file_get_contents("img/".$r3.".svg");
    print "DADOS<br/>".$dado1.$dado2.$dado3."<br/>";
    #proceso
    $texto="null";
    if ($r1==$r2&&$r2==$r3) {/*Trio*/
        $texto="Ha habido trio de ".$r1;
    }elseif ($r1==$r2) {/*pareja AB */
        $texto="Ha habido pareja de ".$r1;
    }elseif ($r1==$r3) {/*pareja AC */
        $texto="Ha habido pareja de ".$r1;
    }elseif ($r2==$r3) {/*pareja BC */
        $texto="Ha habido pareja de ".$r2;
    }elseif ($r1>$r2&&$r1>$r3) {/*Mayor A */
        $texto="Valor mayor de ".$r1;
    }elseif ($r2>$r1&&$r2>$r3) {/*Mayor B */
        $texto="Valor mayor de ".$r2;
    }elseif ($r3>$r1&&$r3>$r2) {/*Mayor 2 */
        $texto="Valor mayor de ".$r3;
    }
    print $texto;
?>