<?php
    $patron=$_POST['patron'];
    $cadena=$_POST['cadena'];
    function comparar($patron,$cadena){
        print preg_match($patron,$cadena);
    }
    comparar($patron,$cadena);
?>