<?php
    $directorio=".";
    $handlerDir=opendir("$directorio");
    //iterar por cada elemento
    while ($elemento = readdir($handlerDir)) {
        $fechaMod=date(DATE_RSS,filemtime($elemento));
        if (is_dir($elemento)) {
            echo "$elemento con fecha de modificacion $fechaMod<br/>";
        }elseif (is_file($elemento)) {
            $tamano=filesize($elemento);
            echo "$elemento con fecha de modificacion $fechaMod  y tamaño $tamano<br/>";
        }
    }
?>
