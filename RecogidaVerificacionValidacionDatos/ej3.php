<?php
if (isset($_REQUEST['enviar'])) {
    //validaicon
    if (isset($_REQUEST['cine'])) {
        print "Le gusta el cine<br>";
    }
    if (isset($_REQUEST['literatura'])) {
        print "Le gusta el literatura<br>";
    }
    if (isset($_REQUEST['musica'])) {
        print "Le gusta el musica<br>";
    }
    if(!isset($_REQUEST['cine'])&&!isset($_REQUEST['literatura'])&&!isset($_REQUEST['musica'])){
        print "No le guta naa<br>";
    }
} else {
    //enviar formulaire
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ej3.php" method="post">
        <p>Aficiones</p>
        <label for="0">Cine</label>
        <input type="checkbox" name="cine" id="0" value="Cine">
        <label for="1">Literatura</label>
        <input type="checkbox" name="literatura" id="1" value="Literatura">
        <label for="2">Musica</label>
        <input type="checkbox" name="musica" id="2" value="Musica">
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>
<?php
}

?>