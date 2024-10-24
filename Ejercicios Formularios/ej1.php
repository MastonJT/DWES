<?php
    $segundos=$_POST['numero'];
    echo $segundos.' segundos son '.intval($segundos/60).' minutos y '.($segundos%60).' segundos';
?>