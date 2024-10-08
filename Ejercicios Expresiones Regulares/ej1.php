<?php
$cadena=$_POST['cadena'];
switch (true) {//el orden importa :D
    //Cadena vacia
    case ($cadena==""):print "Es una cadena vacía.";break;
    //palabras
    case (preg_match('/^([a]*[e]*[i]*[o]*[u]*)$/',$cadena)):print "Es una cadena de vocales minusculas sin acentuar y en orden alfabetico";break;
    case (preg_match('/^[[:alpha:]]+$/i',$cadena)):print "Es una unica palabra sin caracteres del alfabeto sajón.";break;
    case (preg_match('/^[a-zñáéíóú]+$/i',$cadena)):print "Es una única palabra con caracteres castellanos.";break;
    case (preg_match('/^([a-zñáéíóú]+)([\s]+)([a-zñáéíóú]+)$/i',$cadena)):print "Es una sucesión de palabras castellanas.";break;
    //numeros
    case (preg_match('/^[6|9][[:digit:]]{8}$/',$cadena)):print "Es un número de teléfono";break;
    case (preg_match('/^[[:digit:]]{1,8}[[:alpha:]]$/',$cadena)):print "Es un DNI";break;
    case (preg_match('/^[01234][[:digit:]]{4}$/',$cadena)):print "Es un codigo postal.";break;
    case (preg_match('/^[[:digit:]]*[24680]+$/',$cadena)):print "Es un numero par.";break;
    case (preg_match('/^[[:digit:]]+$/',$cadena)):print "Es un unico numero sin decimales ni signo.";break;
    default:print "Algo salio mal";break;
}
?>