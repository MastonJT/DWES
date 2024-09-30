<?php
$paisCapital=[
    "Portugal","Lisboa",
    "España","Madrid",
    "Francia","Paris",
    "Holanda","Amsterdam",
    "Bégica","Bruselas",
    "Alemania","Berín",
    "Dinamarca","Copenague",
    "Suecia","Estocolmo",
    "Estonia","Tallin",
    "Letonia","Vilna",
    "Lituania","Riga",
    "Polonia","Varsovia",
    "Chequia","Praga",
    "Eslovaquia","Bratislava",
    "Hungría","Budapest",
    "Austria","Viena",
    "Italia","Roma",
    "Slovenia","Lubliana",
    "Croacia","Zagreb",
    "Rumanía","Bucharest",
    "Bulgaria","Sofia",
    "Grecia","Atenas",
    "Finlandia","Helsinki",
    "Luxemburgo","Luxemburgo",
    "Malta","La Valleta",
    "Chipre","Nicosia",
    "Irlanda","Dublin",
];
for ($i=0; $i < count($paisCapital) ; $i+=2) { 
    print "La capital de ".$paisCapital[$i]." es ".$paisCapital[$i+1].".<br/>";
}
?>