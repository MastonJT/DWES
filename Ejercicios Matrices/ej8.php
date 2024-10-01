<?php
    $pais["nombre"]=["España","Italia","Francia","Reino Unido","Alemania"];
    $pais["moneda"]=["Peseta","Lira","Franco","Libra","Marco"];
    $pais["habla"]=["Castellano","Italiano","Francés","Ingés","Alemán"];
    print "
        <!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title>Document</title>
            <style>
                table, tr, td, th{
                    border:1px solid brown;
                    text-align:center;
                }
            </style>
        </head>
        <body>
        <table>
            <tr><th colspan=3>PAISES MONEDAS E IDIOMA OFICIAL</th></tr>
            <tr>";
    foreach ($pais as $tipo => $registro) {
        print "<th>$tipo</th>";
    }
    print "</tr>";
    for ($i=0; $i <  count($pais["nombre"]); $i++) { 
        print "<tr>
                <td>{$pais["nombre"][$i]}</td>
                <td>{$pais["moneda"][$i]}</td>
                <td>{$pais["habla"][$i]}</td></tr>";
    }
    print"
        </table>
        </body>
        </html>";
?>