<?php
    $minVal=$_POST['minVal'];
    $maxVal=$_POST['maxVal'];
    $valMin=$_POST['valMin'];
    $valMax=$_POST['valMax'];
    $orden=$_POST['orden'];
    $tamano=rand($minVal,$maxVal);
    for ($i=0; $i <$tamano ; $i++) { 
        $matriz[]=rand($valMin,$valMax);
    }
    if ($orden=="directo") {
        sort($matriz);
    }elseif ($orden=="inverso") {
        rsort($matriz);
    }
    print "<pre>";print_r($matriz);print "</pre>";
?>