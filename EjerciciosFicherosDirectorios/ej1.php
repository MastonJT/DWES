<?php
    $archivo="../Ejercicios Matrices/ej5_2.html";
    $archivoLectura=fopen($archivo,"r") or die("No se pudo abrir el fichero $archivo");

    // leer toodo de una
    $txt=fread($archivoLectura,filesize($archivo));
    // Alternativamente leer por segmentos de bytes
    // while(!feof($archivoLectura)){
    //     $txt=fread($archivoLectura,2);
    //     print $txt;
    // }
    fclose($archivoLectura);

    // gaurdar en fichero salida
    $ficheroSalida="fich_salida.txt";
    $streamEscritura=fopen($ficheroSalida,"w") or die("No se pudo crear el archivo");
    fwrite($streamEscritura,$txt);
    fclose($streamEscritura);

    //imprimir tama
    print filesize($ficheroSalida);
?> 