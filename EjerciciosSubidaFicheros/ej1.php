<?php
if (isset($_REQUEST['enviar'])) {
    
} else {
    imprimirFormulario();
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
        <label for="file">Adjuntar fichero</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
        <input type="file" name="fichero" id="file">Seleccionar fichero...</form>    
    </body>
    </html>
    <?php
}

?>