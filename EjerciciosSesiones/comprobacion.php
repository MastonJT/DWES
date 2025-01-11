<?php
    if(!isset($_SESSION["nombre"]) || !isset($_SESSION["contrasena"])){
        Header("Location:salida.php?resultado=correcto");
    }else{
        Header("Location:salida.php?resultado=incorrecto");
    }
?>