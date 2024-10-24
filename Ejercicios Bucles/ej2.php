<?php
    $r=rand(1,10);
    $circulo="";
    $rectangulo="";
    for ($i=1; $i <=$r ; $i++) { 
        $rectangulo.="<rect height=110 width=110 stroke=black stroke-width=1 fill=white y=5 x=".($i*120+5-120)."></rect>";
        $circulo.="<circle r=50 cy=60 cx=".($i*120-60)." fill=rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")></circle>";
    }
    print "<svg height=120 width=1200><rect height=120 stroke=black fill=white stroke-width=1 width=".($r*120)."></rect>".$rectangulo.$circulo."</svg>";
?>