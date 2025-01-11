<?php
    session_name("ejer3");
    session_start();

    if(!isset($_SESSION["usuario"]) || !isset($_SESSION["contrasena"])){
        print "<p>No estás autenticado por lo que no puedes ver la página</p>";
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ahora estás en una aplicación segura</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget nibh nec ligula tincidunt tincidunt. Proin sed ultricies sem. Nam posuere magna eu eleifend efficitur. Sed accumsan sollicitudin est, sed tincidunt neque scelerisque nec. Ut volutpat erat ut nulla varius venenatis. Pellentesque sed erat maximus, pretium magna vitae, blandit magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et nisi turpis. Integer interdum, arcu ac cursus vulputate, purus metus feugiat sapien, sed condimentum orci risus eu turpis. Maecenas dictum mi id feugiat accumsan. In sit amet sapien non lectus mattis fermentum sit amet quis purus. Praesent consectetur scelerisque tortor non auctor. Aliquam eu lobortis mi. Pellentesque vel libero elementum, gravida est non, bibendum erat. Integer ullamcorper magna posuere ex accumsan, ut ultricies orci posuere. In nec est at tellus sollicitudin lobortis ac vitae elit. </p>
    <a href="salida.php">Haz click aquí para salir</a>
</body>
</html>
<?php
    }
?>