<?php
if (isset($_REQUEST['enviar'])) {
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
    switch (true) {
        case !isset($_FILES['fichero']['name']):
            $mensajeErr.="<p style=\"color:red;\">No se ha seleccionado ningun archivo.</p>";break;
        case $_FILES['fichero']['size']>20000000:
            $mensajeErr.="<p style=\"color:red;\">Se ha superado el tamaño máximo del archivo.</p>";break;
        case $_FILES['fichero']['size']>20000000:
            $mensajeErr.="<p style=\"color:red;\">Se ha superado el tamaño máximo del archivo.</p>";break;
        default:
            # code...
            break;
    }
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
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size=200; ?>" />
        <input type="file" name="fichero" id="file"></form>    
    </body>
    </html>
    <?php
}

?>