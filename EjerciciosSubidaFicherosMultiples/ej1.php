<?php
if (isset($_REQUEST['enviar'])) {
    //validar nombre
    $mensaje="";
    $regex='/^[a-zàèìòùñ\s]{0,18}$/i';
    $nombre=sanear($_REQUEST['nombre']);
    if ($nombre=="") {
        $mensaje.="<p style='color:red;'>Campo nombre esta vacio.</p>";
    }elseif (!preg_match($regex,$nombre)) {
        $mensaje.="<p style='color:red;'>Campo nombre contiene caracteres invalidos.</p>";
    }else {
        $mensaje.="<p>Nombre: {$nombre}</p>";
    }
    //validar apellidos
    $regex='/^[a-zàèìòùñ\s\-]{0,18}$/i';
    $apellido=sanear($_REQUEST['apellido']);
    if ($apellido=="") {
        $mensaje.="<p style='color:red;'>Campo apellido esta vacio.</p>";
    }elseif (!preg_match($regex,$apellido)) {
        $mensaje.="<p style='color:red;'>Campo apellido contiene caracteres invalidos.</p>";
    }else {
        $mensaje.="<p>apellido: {$apellido}</p>";
    }
    //validar direccion
    $regex='/^(Calle\s|Plaza\s|Avenida\s)([a-zàèìòùñ\s]+[0-9]+)+$/i';
    $direccion=sanear($_REQUEST['direccion']);
    if ($direccion=="") {
        $mensaje.="<p style='color:red;'>Campo direccion esta vacio.</p>";
    }elseif (!preg_match($regex,$direccion)) {
        $mensaje.="<p style='color:red;'>Campo direccion contiene caracteres invalidos.</p>";
    }else {
        $mensaje.="<p>direccion: {$direccion}</p>";
    }
    //validar fotos
    foreach ($_FILES['archivos'] as $indice => $fichero) {
        switch ($fichero['error']) {
            case 1:$mensaje.="<p style='color:red;'>Error del tamano maximo en php.ini.</p>";break;
            case 2:$mensaje.="<p style='color:red;'>Error del tamano por max file.</p>";break;
            case 3:$mensaje.="<p style='color:red;'>Error subido parcialmente.</p>";break;
            case 4:$mensaje.="<p style='color:red;'>No se ha subido el fichero.</p>";break;
            case 6:$mensaje.="<p style='color:red;'>Sin carpeta temporal.</p>";break;
            case 7:$mensaje.="<p style='color:red;'>No se puede escribir.</p>";break;
            case 8:$mensaje.="<p style='color:red;'>Extension php detenida por la subida.</p>";break;
            default:
            //no hay error
            //guardar los nombres del fichero
            $nombresArchivo=pathinfo($fichero['name']);
            //valirdar extension
            $regex='/^(jpg|png|jpeg)$/';
            if (preg_match($regex,$nombresArchivo['extension'])) {
                //extension valida procede a crear el directorio para guardar
                $directorio='imagenes/'.$nombresArchivo['basename'];
                //verificar que el directorio esta libre
                if (is_file($directorio)) {
                    //crear id unico
                    $directorio='imagenes/'.time().$nombresArchivo['basename'];
                }
                //proceder a mover el archivo al directori fenitivio
                if(move_uploaded_file($fichero['tmp_name'],$directorio)){
                    $mensaje.="<p>Archivo: {$nombresArchivo['basename']} movido con exito</p>";
                    $mensaje.="<img src='{$directorio}'/>";
                }else {
                    $mensaje.="<p style='color:red;'>Hubo un error al guardar el archivo.</p>";
                }
            }else {
                $mensaje.="<p style='color:red;'>Extension de archivo invalida.</p>";
            }
            break;
        }
    }
} else {enviarFormulario();}

function sanear($parametro) {
    return htmlspecialchars(trim(strip_tags($parametro)),ENT_QUOTES,"UTF-8");
}

function enviarFormulario(){
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="ej1.php" method="post" enctype="multipart/form-data">
            <label for="inputNombre">Nombre: </label>
            <input type="text" name="nombre" id="inputNombre">
            <label for="inputApellido">Apellido: </label>
            <input type="text" name="apellido" id="inputApellido">
            <label for="inputDireccion">Direccion: </label>
            <input type="text" name="direccion" id="inputDireccion">
            <label for="inputArchivo">Archivo: </label>
            <input type="file" name="archivos[]" id="inputArchivo" multiple>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    </body>

    </html>
<?php
}
?>