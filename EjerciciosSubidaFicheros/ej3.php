<?php
//verificacion envio del formulario
if (isset($_REQUEST['enviar'])) {
    //validar tipo de vivienda
    $mensaje = "";
    $tipoVivienda = sanear($_REQUEST['vivienda']);
    $mensaje .= "<p>Vivienda {$tipoVivienda}</p>";
    //validar zona
    $zona = sanear($_REQUEST['zona']);
    $mensaje .= "<p>Zona {$zona}</p>";
    //validar direccion
    $regex = '/^[a-zñàèìòù\s\-0-9]+$/';
    $direccion = sanear($_REQUEST['direccion']);
    if (!preg_match($regex, $direccion)) {
        $mensaje .= "<p style='color: red;'>La direccion contiene caracteres invalidos.</p>";
    } elseif ($direccion == "") {
        $mensaje .= "<p style='color: red;'>La direccion esta en blanco.</p>";
    } else {
        $mensaje .= "<p>Direccion: {$direccion}</p>";
    }
    //validar numero dormitorios
    if (isset($_REQUEST['numDormitorios'])) {
        $dormitorios = sanear($_REQUEST['numDormitorios']);
        $mensaje .= "<p>Numero de dormitorios: {$dormitorios}</p>";
    } else {
        $mensaje .= "<p style='color: red;'>Error al seleccionar el numero de dormitorios.</p>";
    }
    //validar precio
    $precio=sanear($_REQUEST['precio']);
    $regex='/^[0-9]+([,.][0-9]{2})*$/';
    if ($precio=="") {
        $mensaje .= "<p style='color: red;'>Campo precio esta vacio.</p>";
    }elseif (!preg_match($regex,$precio)) {
        $mensaje .= "<p style='color: red;'>Campo precio contiene caracteres invalidos.</p>";
    }else{
        $mensaje .= "<p>Precio: {$precio}</p>";
    }
    //validar tamano
    $tamano=sanear($_REQUEST['tamano']);
    $regex='/^[0-9]+([,.][0-9]{2})*$/';
    if ($tamano=="") {
        $mensaje .= "<p style='color: red;'>Campo tamano esta vacio.</p>";
    }elseif (!preg_match($regex,$tamano)) {
        $mensaje .= "<p style='color: red;'>Campo tamano contiene caracteres invalidos.</p>";
    }else{
        $mensaje .= "<p>tamano: {$tamano}</p>";
    }
    //validar extras
    if (!isset($_REQUEST['extras'])) {
        $mensaje .= "<p>Ningun extra elegido.</p>";
    }else {
        $mensaje .= "<p>Extras elegidos: {$REQUEST['extras']}</p>";
    }
    //validar foto

    $error=$_FILES['foto']['error'];
    switch ($error) {
        case 1:print("Error de tamano maximo en php.ini");break;
        case 2:print("Error de tamano por max file");break;
        case 3:print("Subido parcialmente");break;
        case 4:print("No se ha subido el fichero, no ha llegado a subirse");break;
        case 6:print("Sin carpeta temporal");break;
        case 7:print("No se puede escribir");break;
        case 8:print("Extension php detenida por la subida");break;
        default:
            //guardar nombre
            $nombresArchivo=pathinfo($_FILES['foto']['name']);
            //validar extension
            $regexTipo='/^(png|jpg|jpeg)$/i';
            if (preg_match($regexTipo,$nombresArchivo['extension'])) {
                //proceder a guardar en un directorio
                $directorio='imagenes/'.$nombresArchivo['basename'];
                //verficar que el directorio esta libre
                if (is_file($directorio)) {
                    //crear directorio unico
                    $directorio='imagenes/'.time().$nombresArchivo['basename'];
                }
                //guardar el archivo en el directorio y verificar que se haya subido correctamente
                if (move_uploaded_file($_FILES['foto']['tmp_name'],$directorio)) {
                    $mensaje .= "<p>Archivo subido y guardado con exito.</p>";
                    $mensaje .= "<img src='{$directorio}'/>";
                }else {
                    $mensaje .= "<p style='color: red;'>Hubo un error al guardar el archivo.</p>";
                }
            }
            break;
        }
    echo($mensaje);
} else {
    enviarFormulario();
}
function sanear($datos)
{
    return htmlspecialchars(trim(strip_tags($datos)), ENT_QUOTES, "UTF-8");
}
function enviarFormulario()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <form action="ej3.php" method="post" enctype="multipart/form-data">
            <h3>Introduzca los datos de la vivienda.</h3>
            <label for="inputTipoDeVivienda">Tipo de vivienda:</label>
            <select name="vivienda" id="inputTipoDeVivienda">
                <option>Casa</option>
                <option>Piso</option>
                <option>Palacio</option>
            </select>
            <br>
            <label for="inputZona">Zona:</label>
            <select name="zona" id="inputZona">
                <option>Centro</option>
                <option>Afueras</option>
                <option>Fuenlabrada</option>
            </select>
            <br>
            <label for="inputDireccion">Direccion: </label>
            <input type="text" name="direccion" id="inputDireccion">
            <br>
            <label>Numero de dormitorios: </label>
            <label for="1dorm">1</label>
            <input type="radio" name="numDormitorios" id="1dorm" value='1'>
            <label for="1dorm">2</label>
            <input type="radio" name="numDormitorios" id="2dorm" value='2'>
            <label for="1dorm">3</label>
            <input type="radio" name="numDormitorios" id="3dorm" value='3'>
            <label for="1dorm">4</label>
            <input type="radio" name="numDormitorios" id="4dorm" value='4'>
            <label for="1dorm">5</label>
            <input type="radio" name="numDormitorios" id="5dorm" value='5'>
            <br>
            <label for="inputPrecio">Precio: </label>
            <input type="text" name="precio" id="inputPrecio">
            <label for="inputPrecio">$</label>
            <br>
            <label for="inputTamano">Tamano: </label>
            <input type="text" name="tamano" id="inputTamano">
            <label for="inputTamano">m3</label>
            <br>
            <label>Extras (marque los que procedan)</label>
            <input type="checkbox" name="extras[]" id="piscina" value="piscina">
            <label for="piscina">Piscina</label>
            <input type="checkbox" name="extras[]" id="jardin" value="jardin">
            <label for="jardin">Jardin</label>
            <input type="checkbox" name="extras[]" id="garaje" value="garaje">
            <label for="garaje">Garaje</label>
            <br>
            <label for="inputFoto">Foto: </label>
            <input type="file" name="foto" id="inputFoto">
            <br>
            <label for="inputObservaciones">Observaciones: </label>
            <textarea name="observaciones" id="inputObservaciones"></textarea>
            <br>
            <input type="submit" name="enviar" value="enviar">
        </form>
    </body>

    </html>
<?php
}
?>