<?php
    function verificarNumero(){
        $numero=$_POST['numero'];
        $regex='/^([+][3][4][\s]?)?([69][0-9]{8})$/';
        if (preg_match($regex,$numero)) {
            print "Es un número muy español y mucho español.";
        }else {
            print "No es un número español.";
        }
    }
    verificarNumero();
?>