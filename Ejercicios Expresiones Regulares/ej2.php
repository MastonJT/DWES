<?php
    $texto=$_POST['testo'];
    $cond1='/^[a-zñáéíóú]([\s][a-zñáéíóú])*$/i';
    $cond2='/^[a-zñáéíóú][\s][a-zñáéíóú]([\s][a-zñáéíóú])*$/i';
    $cond3='/^[[:alpha:]]+([\s][[:alpha:]]+)*$/';
    $cond4='/^[A-ZÑÁÉÍÓÚ]+$/';
    $cond5='/^([[:digit:]]{2}[\/]){2}[[:digit:]]{4}$/';
    $cond6='/^[[:digit:]]+([.,][[:digit:]]{1,2})?$/';
    $cond7='/^[+-][[:digit:]]+([.,][[:digit:]]+)?$/';
    $cond8='/^[a-zñáéíóú0-9*+.-_,]{6,}$/i';
    if (preg_match($cond1,$texto)) {
        print "La cadena $texto es una o más letras sueltas separadas por espacios<br/>";
    } else {
        print "La cadena $texto NO Es una o más letras sueltas separadas por espacios<br/>";
    }
    if (preg_match($cond2,$texto)) {
        print "La cadena $texto es dos o más letras sueltas separadas por espacios.<br/>";
    } else {
        print "La cadena $texto NO es dos o más letras sueltas separadas por espacios.<br/>";
    }
    if (preg_match($cond3,$texto)) {
        print "La cadena $texto es una o más palabras (sólo letras inglesas minúsculas, separadas por uno o varios espacios).<br/>";
    } else {
        print "La cadena $texto NO es una o más palabras (sólo letras inglesas minúsculas, separadas por uno o varios espacios).<br/>";
    }
    if (preg_match($cond4,$texto)) {
        print "La cadena $texto es una única palabra en mayúsculas.<br/>"; 
    } else {
        print "La cadena $texto NO es una única palabra en mayúsculas.<br/>";
    }
    if (preg_match($cond5,$texto)) {
        print "La cadena $texto es fecha de nacimiento: dd/mm/aaaa<br/>";
    } else {
        print "La cadena $texto NO es fecha de nacimiento: dd/mm/aaaa<br/>";
    }
    if (preg_match($cond6,$texto)) {
        print "La cadena $texto es un único número sin signo y con como mucho dos decimales (el separador puede ser punto o coma, pero sólo puede estar si hay decimales).<br/>";
    } else {
        print "La cadena $texto NO es un único número sin signo y con como mucho dos decimales (el separador puede ser punto o coma, pero sólo puede estar si hay decimales).<br/>";
    }
    if (preg_match($cond7,$texto)) {
        print "La cadena $texto es un único número con signo (más o menos) y con decimales (el separador puede ser punto o coma, pero sólo puede estar si hay decimales).<br/>";
    } else {
        print "La cadena $texto NO es un único número con signo (más o menos) y con decimales (el separador puede ser punto o coma, pero sólo puede estar si hay decimales).<br/>";
    }
    if (preg_match($cond8,$texto)) {
        print "La cadena $texto es contraseña (al menos seis caracteres, puede contener letras, números y los caracteres * + . - _, pero no espacios u otros caracteres).<br/>";
    } else {
        print "La cadena $texto NO es contraseña (al menos seis caracteres, puede contener letras, números y los caracteres * + . - _, pero no espacios u otros caracteres).<br/>";
    }
    
?>