<?php
    $minVal=$_POST['minVal'];
    $maxVal=$_POST['maxVal'];
    $valMin=$_POST['valMin'];
    $valMax=$_POST['valMax'];
    $tamano=rand($minVal,$maxVal);
    for ($i=0; $i <$tamano ; $i++) { 
        $matriz[]=rand($valMin,$valMax);
    }
    print "<pre>";print_r($matriz);print "</pre>";
?>