<?php
$error = "";
$nombre;
$errNombre;
$clave;
$errClave;
$edad;
$errEdad;
$errArchivo;
$validarFichero=true;

if (!isset($_REQUEST['enviar'])) {
    enviarFormulario();
} else {
    $edad = sanear($_REQUEST['edad']);
    $clave = sanear($_REQUEST['clave']);
    $nombre = sanear($_REQUEST['nombre']);
    if (!preg_match('/^[A-Z][a-z]+([-\s]?[A-Z][a-z]+)*$/', $user)){
        $errNombre="<p style='color:red;'>Nombre: {$nombre}</p>";
        $validarFichero=false;
    }
    if (!preg_match('/^[0-9a-z]+$/i', $pass)) {
        $errNombre="<p style='color:red;'>Nombre: {$nombre}</p>";
        $validarFichero=false;
    }
    if (!preg_match('/^\d$/', $edad)) {
        $errNombre="<p style='color:red;'>Nombre: {$nombre}</p>";
        $validarFichero=false;
    }
    if ($validarFichero) {
        $error=$_FILES['archivo']['error'];
        switch ($error) {
            case 1:
                $errorArchivo="Error de tamano maximo de php.ini";
                break;
            case 2:
                $errorArchivo="Error de tamano por max file.";
                break;
            case 3:
                $errorArchivo="Subido parcialmente";
                break;
            case 4:
                $errorArchivo="No se ha subido el fichero o no ha llegado a subirse.";
                break;
            case 6:
                $errorArchivo="Sin carpeta temporal";
                break;
            case 7:
                $errorArchivo="No se puede escribir";
                break;
            case 8:
                $errorArchivo="Extension php detenida por la subida";
                break;
            default:
                //guardar el nombre del archivo
                $nombresArchivo=pathinfo($_FILES['archivo']['name']);
                break;
        }
    }
}



function sanear($dato)
{
    return htmlspecialchars(strip_tags(trim($dato)), ENT_QUOTES, 'UTF-8');
}

function enviarFormulario()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina0</title>
    </head>

    <body>
        <form action="pantalla0.php" method="post" enctype="multipart/form-data">
            <label>Nombre: <input type="text" name="nombre"></label><br>
            <label>clave: <input type="text" name="clave"></label><br>
            <label>Edad: <input type="text" name="edad"></label><br>
            <label>Foto: <input type="file" name="archivo" id=""></label>
            <?php global $error;
            echo $error; ?>
            <input type="submit" value="Iniciar sesion" name="enviar">
        </form>
    </body>

    </html>
<?php
}
