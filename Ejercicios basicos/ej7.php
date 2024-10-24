<?php
    $r1=rand(50,150);
    $r2=rand(50,150);
    $r3=rand(50,150);
    print "<svg height=302 width=906>
        <circle r=".$r1." cx=".(452-($r2+$r1+1))." cy=151 stroke=black stroke-width=2 fill=red></circle>
        <circle r=".$r2." cx=452 cy=151 stroke=black stroke-width=2 fill=green></circle>
        <circle r=".$r3." cx=".(452+($r2+$r3+1))." cy=151 stroke=black stroke-width=2 fill=blue></circle>
    </svg>";
?>