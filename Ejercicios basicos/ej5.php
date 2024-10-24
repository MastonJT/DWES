<?php
    $rand1=rand(1,6);
    $rand2=rand(1,6);
    $dado1=file_get_contents("img/".$rand1.".svg");
    $dado2=file_get_contents("img/".$rand2.".svg");
    print $dado1.$dado2;
    print 'Total: '.($rand1+$rand2);
?>