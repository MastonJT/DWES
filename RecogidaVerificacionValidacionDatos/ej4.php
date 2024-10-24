<?php
function imprimirPagina($colorFondo,$colorLetra){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            background-color:<?php echo $colorFondo ?>;
            color:<?php echo $colorLetra ?>;
        }
    </style>
</head>
<body>
    <form action="ej4.php" method="post">
        <label for="colorFondo">Elija el color de fondo de pagina:</label>
        <input type="color" name="colorF" id="colorFondo"><br>
        <label for="colorLetra">Elija el color de la letra:</label>
        <input type="color" name="colorL" id="colorLetra">
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>

<?php
}
if (isset($_REQUEST['enviar'])) {
    //Procesar
    $colorF=$_REQUEST['colorF'];
    $colorL=$_REQUEST['colorL'];
    imprimirPagina($colorF,$colorL);
} else {
    //Mostrar formulaire
    imprimirPagina("white","black");
}
?>