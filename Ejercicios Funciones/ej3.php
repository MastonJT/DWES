<?php
    $caracter=$_POST['caracter'];

    function queCaracterEs(&$caracter){
        switch (true) {
            case ctype_upper($caracter):print "Es un carácter en mayúscula.";break;
            case ctype_lower($caracter):print "Es un carácter en minúscula.";break;
            case ctype_digit($caracter):print "Es un digito.";break;
            case ctype_space($caracter):print "Es un espacio en blanco.";break;
            case ctype_punct($caracter):print "Es un un sinmbolo de puntuacion.";break;
            case ($caracter==""):;
            default:print "Es un una cosa sin identificar.";break;
        }
        
    }

    queCaracterEs($caracter);
?>