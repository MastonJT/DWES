<?php
    if (isset([$_REQUEST['enviar']])) {
        //validar nombre
        $mensajeErr;
        if (preg_match('/^[a-zñàèìòù]+([\s-][a-zñàèìòù]+)*$/')) {
            # code...
        }
        //validar texto
        //validar categoria
        //validar archivo
    }else {//enviar formulario
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
                <h3>Insertar nueva noticia.</h3>
                <label for="nom">Nombre:</label>
                <input type="text" name="nombre" id="nom">
                <label for="test">Texto:</label>
                <textarea name="texto" id="test"></textarea>
                <select name="categorias" id="">
                    <option value="costas">costas</option>
                    <option value="mares">mares</option>
                    <option value="playas">playas</option>
                </select>
                <label for="img">Imagen</label>
                <input type="file" name="imagen" id="img">
                <input type="submit" value="enviar">
            </form>
        </body>
        </html>
        <?php
    }
?>
