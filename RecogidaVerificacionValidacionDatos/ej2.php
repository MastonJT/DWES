<?php
    if (isset($_REQUEST['enviar'])) {
        switch (isset($_REQUEST['seso'])) {
            case "":print "Sexo sin especificar";break;
            default:print "Eres {$_REQUEST['seso']}";break;
        }
    } else {
        //imrpimir formulaire
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ej2.php" method="post">
        <p>Seleccione sexo</p>
        <label for="0">Hombre</label>
        <input type="radio" name="seso" id="0" value="Hombre">
        <label for="1">Mujer</label>
        <input type="radio" name="seso" id="1" value="Mujer">
        <label for="2">Otro</label>
        <input type="radio" name="seso" id="2" value="sin especificar">
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>
<?php
    }
    
?>