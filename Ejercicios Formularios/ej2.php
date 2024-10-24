<?php
    $kg=$_POST['kilos'];
    $m=$_POST['altura']/100;
    echo 'Su indice de masa corporal es '.intval($kg/pow($m,2));
?>