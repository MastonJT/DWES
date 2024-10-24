<?php
 $numFilas=$_POST['numFilas'];

 function generarTabla($numFilas){
    print '<form action="ej52.php" method="post">';
    $cantCelda=0;
    for ($i=0; $i < $numFilas; $i++) { //este for pasa por filas
        for ($j=0; $j < $numFilas; $j++) { //este for pasa por columnas
            $cantCelda++;
            print "<input type=\"number\" name=\"c".$i.$j."\">";
        }
        print "<br/>";//salta a la siguiente linea
    }
    print "<input style=\"display: none;\" type=\"number\" name=\"numCeldas\" value=\"$cantCelda\"><input type=\"submit\" value=\"Enviar\"></form>";
 }
 generarTabla($numFilas);

?>