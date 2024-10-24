<?php
    $minVal=$_POST['minVal'];
    $maxVal=$_POST['maxVal'];
    $valMin=$_POST['valMin'];
    $valMax=$_POST['valMax'];
    $valElim=$_POST['valElim'];
    $tamano=rand($minVal,$maxVal);
    for ($i=0; $i <$tamano ; $i++) { 
        $matriz[]=rand($valMin,$valMax);
    }
    print "<pre>";print_r($matriz);print "</pre>";
    foreach ($matriz as $indice=>$valor) {
        if ($valor==$valElim) {
            unset($matriz[$indice]);
        }
    }
    array_values($matriz);
    print "<pre>";print_r($matriz);print "</pre>";

?>