<?php
    //primero tomar los valores de los campos
    $cantCeldas=$_POST['numCeldas'];
    $numFilas=sqrt($cantCeldas);
    $arr;
    //guardarlos en un array
    for ($i=0; $i < $numFilas; $i++) {
        for ($j=0; $j < $numFilas; $j++) { 
            $arr[$i][$j]=$_POST["c".$i.$j];
        }
    }
    //print_r($arr);
    //segundo imprimir la matriz normal
    imprimirTabla("La matriz inicial es:","blue");
    //tercero imprimir tabla dada la vuelta
    $arr=array_reverse($arr);
    imprimirTabla("La matriz invertida por filas es:","red");
    //funcion
    function imprimirTabla($texto,$color){
        global $numFilas;
        global $arr;
        print "<p>$texto</p>";
        print "<table style=\"border:1px solid $color;\">";
        for ($i=0; $i <$numFilas ; $i++) { 
            print "<tr>";
            for ($j=0; $j < $numFilas; $j++) { 
                print "<td style=\"border:1px solid $color\">".$arr[$i][$j]."<td>";
            }
            print "</tr>";
        }
        print "</table>";
    }
?>