<?php
    $cantidad=$_POST['cantidad'];
    $divisa=$_POST['divisa'];
    switch ($divisa) {
        case '0'://dolar
            echo $cantidad.' euros son '.($cantidad).' dolares estadounidenses.';
            break;
        
        case '1'://peso
            echo $cantidad.' euros son '.($cantidad*20.08).' pesos mexicanos.';
            break;
            
        case '2'://yen
            echo $cantidad.' euros son '.($cantidad*143.05).' yenes japoneses.';
            break;
                
        case '3'://peseta
            echo $cantidad.' euros son '.($cantidad*166.386).' pesetas.';
            break;
        
        default:
            echo '¿Qué has hecho para llegar hasta aquí?';
            break;
    }
?>