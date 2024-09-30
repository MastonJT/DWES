<?php
$colores["fuertes:"] = ["rojo:", "FF0000", "verde:", "00FF00", "azul:", "0000FF"];
$colores["suaves:"] = ["rosa:", "FE9ABC", "amarillo:", "FDF189", "malva:", "BC8F8F"];

print "<table style=\"border:1px solid black\">";
foreach ($colores as $indiceTipo => $tipo) {
    print "<tr><td>" . $indiceTipo . "</td>";
    for ($i = 0; $i < count($tipo); $i += 2) {
        print "<td style=\"background-color:#" . $tipo[$i+1] . "\">" . $tipo[$i] . $tipo[$i+1] . "</td>";
    }
    print "</tr>";
}
print "</table>";
?>