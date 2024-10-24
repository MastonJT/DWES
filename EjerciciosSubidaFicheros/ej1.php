<?php
if (isset($_REQUEST['enviar'])&&isset($_FILES['fichero'])) {
    //sanear cosas
    $nombre=sanear($_REQUEST['nombre']);
    $apellido=sanear($_REQUEST['apellido']);
    $edad=sanear($_REQUEST['edad']);
    $telefono=sanear($_REQUEST['telefono']);
    $email=sanear($_REQUEST['email']);
    $mensajeErr="";
    //validar nombre
    $regex='/^[a-zñáéíóú]+([\s\-][a-zñáéíóú]+)?$/i';
    switch (true) {
        case $nombre=="":
            $mensajeErr.="<p style=\"color:red;\">Campo nombre esta vacío.</p>";break;
        case !preg_match($regex,$nombre):
            $mensajeErr.="<p style=\"color:red;\">Campo nombre contiene caracteres inválidos.</p>";break;
        default:
            $mensajeErr.="<p style=\"color:green;\">Campo nombre:{$nombre}</p>";break;
    }
    //validar apellido
    $regex='/^[a-zñáéíóú]+[\s\-][a-zñáéíóú]+$/i';
    switch (true) {
        case $apellido=="":
            $mensajeErr.="<p style=\"color:red;\">Campo apellido esta vacío.</p>";break;
        case !preg_match($regex,$apellido):
            $mensajeErr.="<p style=\"color:red;\">Campo apellido contiene caracteres inválidos.</p>";break;
        default:
            $mensajeErr.="<p style=\"color:green;\">Campo apellido:{$apellido}</p>";break;
    }
    //validar edad
    $regex='/^[0-9]{1,2}$/i';
    switch (true) {
        case $edad=="":
            $mensajeErr.="<p style=\"color:red;\">Campo edad esta vacío.</p>";break;
        case !preg_match($regex,$edad):
            $mensajeErr.="<p style=\"color:red;\">Campo edad contiene caracteres inválidos.</p>";break;
        default:
            $mensajeErr.="<p style=\"color:green;\">Campo edad:{$edad}</p>";break;
    }
    //validar telefono
    $regex='/^[69][0-9]{8}$/i';
    switch (true) {
        case $telefono=="":
            $mensajeErr.="<p style=\"color:red;\">Campo telefono esta vacío.</p>";break;
        case !preg_match($regex,$telefono):
            $mensajeErr.="<p style=\"color:red;\">Campo telefono contiene caracteres inválidos.</p>";break;
        default:
            $mensajeErr.="<p style=\"color:green;\">Campo telefono:{$telefono}</p>";break;
    }
    //validar email
    $regex='/^[a-z]+[@][a-z]+[.][a-z]+$/i';
    switch (true) {
        case $email=="":
            $mensajeErr.="<p style=\"color:red;\">Campo email esta vacío.</p>";break;
        case !preg_match($regex,$email):
            $mensajeErr.="<p style=\"color:red;\">Campo email contiene caracteres inválidos.</p>";break;
        default:
            $mensajeErr.="<p style=\"color:green;\">Campo email:{$email}</p>";break;
    }
    //manejo del fichero
    if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {//compruebva si se ha subido
        $ficheroNombre=pathinfo($_FILES['fichero']['name']);//guarda varios nombres en un array asociativo
        $regex="/^(png|jpg)$/";
        if (preg_match($regex,$ficheroNombre['extension'])) {//validacao da extencao
            $nombreCompleto='imagenes/'.$ficheroNombre['basename'];//genero una cadena que sirve de direccion
            if (is_file($nombreCompleto)) {//si existe un fichero con el mismo nombre en la carpeta, se añade un identificador unico
                $nombreCompleto='imagenes/'.time().$ficheroNombre['basename'];
            }
            move_uploaded_file($_FILES['fichero']['tmp_name'],$nombreCompleto);//agarra el fichero y lo muevo y lo guarda en el directorio
            $mensajeErr.="Fichero subido correctamente.";
            $mensajeErr.="<img src='$nombreCompleto'/>";
        }else {
            print 'Extension invalida';
        }
        
    } else {
        switch ($_FILES['fichero']['tmp_name']) {//codigos de error
            case 1:print 'Error de tamano maximo en php.ini';break;
            case 2:print 'Error de tamano por max file';break;
            case 3:print 'Subido parcialmente';break;
            case 4:print 'No se ha subido el fichero, no ha llegado a subirse';break;
            case 6:print 'Sin carpeta temporal';break;
            case 7:print 'No se puede escribir';break;
            case 8:print 'Extension php detenida por la subida';break;
            default:print 'No se ha subido el fichero';break;
        }
    }
    print($mensajeErr);
} else {
    imprimirFormulario();
}

function sanear($texto){
    return htmlspecialchars(trim(strip_tags($texto)),ENT_QUOTES,"UTF-8");
}

function imprimirFormulario(){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <form action="ej1.php" method="POST" enctype="multipart/form-data">
        <label for="nom">Nombre:</label>
        <input type="text" name="nombre" id="nom"><br/>
        <label for="ape">Apellido:</label>
        <input type="text" name="apellido" id="ape"><br/>
        <label for="eda">Edad:</label>
        <input type="text" name="edad" id="eda"><br/>
        <label for="tel">Telefono:</label>
        <input type="text" name="telefono" id="tel"><br/>
        <label for="ema">Email:</label>
        <input type="text" name="email" id="ema"><br/>
        <label for="file">Adjuntar fichero</label>
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="<?php// echo $max_file_size=200; ?>" /> -->
        <input type="file" name="fichero" id="file">
        <input type="submit" value="Enviar" name="enviar">
    </form>    
    </body>
    </html>
    <?php
}

?>