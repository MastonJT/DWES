<?php
$cadena=$_POST['cadena'];
switch (true) {
    case ($cadena==""):print "Es una cadena vacía.";break;
    case (preg_match('/^[a-zñáéíóú]$/i')):print "Es una única palabra.";break;
    case (preg_match('/^[a-zñáéíóú\s]$/i')):print "Es una sucesión de palabras.";break;
    case (preg_match('/^[[:alpha:]]$/')):print "Es una unica palabra sin caracteres del alfabeto castellano.";break;
    case (preg_match('/^[aeiou]$/')):print "";break;
    case ():print "";break;
    case ():print "";break;
    case ():print "";break;
    case ():print "";break;
    case ():print "";break;
    case ():print "";break;
    
    default:
        # code...
        break;
}
?>