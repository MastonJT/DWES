<?php
    if(isset($_REQUEST['enviar'])){
        $arrCadenas=[$_REQUEST['nom'],$_REQUEST['ape'],$_REQUEST['cor']];
        //esto quita los tags html, luego los espacios al principio y final y luego los caracteres epeciales html con comillas
        for ($i=0; $i < count($arrCadenas); $i++) { 
            $arrCadenas[$i]=htmlspecialchars(trim(strip_tags($arrCadenas[$i])),ENT_QUOTES,"UTF-8");
        }
    }else {
        imprimirFormulario();
    }
    function imprimirFormulario() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="ej1.php">
                <label for="nombre"></label>
                <input type="text" name="nom" id="nombre">
                <br>
                <label for="apellido"></label>
                <input type="text" name="ape" id="apellido">
                <br>
                <label for="correo"></label>
                <input type="text" name="cor" id="correo">
                <br>
                <button type="submit" value="enviar">Enviar</button>
            </form>
        </body>
        </html>
        <?php
    }
?>