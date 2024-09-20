<?php
$randR=rand(0,255);
$randG=rand(0,255);
$randB=rand(0,255);
print '<svg><rect width=300 height=150 fill=rgb('.$randR.','.$randG.','.$randB.')></rect></svg>
        <svg><rect width=300 height=150 fill=rgb('.(255-$randR).','.(255-$randG).','.(255-$randB).')></rect></svg>';
?>