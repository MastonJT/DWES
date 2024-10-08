<?php
$cadena=$_POST['cadena'];
if($cadena=="")
    print "Es una cadena vacía.<br/>";
else 
    print "NO es una cadena vacía.<br/>";
if(preg_match('/^[a-zñáéíóú]+$/i',$cadena))
    print "Es una única palabra con caracteres castellanos.<br/>";
else
    print "No es una única palabra con caracteres castellanos.<br/>";
if(preg_match('/^([a-zñáéíóú]+)([\s]+)([a-zñáéíóú]+)$/i',$cadena))
    print "Es una sucesión de palabras castellanas.<br/>";
else
    print "No es una sucesión de palabras castellanas.<br/>";
if(preg_match('/^[[:alpha:]]+$/i',$cadena))
    print "Es una unica palabra sin caracteres del alfabeto castellano.<br/>";
else
    print "No es una unica palabra sin caracteres del alfabeto castellano.<br/>";
if(preg_match('/^([a]*[e]*[i]*[o]*[u]*)$/',$cadena))
    print "Es una cadena de vocales minusculas sin acentuar y en orden alfabetico.<br/>";
else
    print "NO es una cadena de vocales minusculas sin acentuar y en orden alfabetico.<br/>";
if(preg_match('/^[[:digit:]]+$/',$cadena))
    print "Es un unico numero sin decimales ni signo.<br/>";
else
    print "No es un unico numero sin decimales ni signo.<br/>";
if(preg_match('/^[[:digit:]]*[24680]+$/',$cadena))
    print "Es un numero par.<br/>";
else
    print "No es un numero par.<br/>";
if(preg_match('/^[6|9][[:digit:]]{8}$/',$cadena))
    print "Es un número de teléfono";
else
    print "No es un número de teléfono.<br/>";
if(preg_match('/^[[:digit:]]{1,8}[[:alpha:]]$/',$cadena))
    print "Es un DNI.<br/>";
else
    print "No es un DNI.<br/>";
if(preg_match('/^[01234][[:digit:]]{4}$/',$cadena))
    print "Es un codigo postal.<br/>";
else
    print "No es un codigo postal.<br/>";

?>