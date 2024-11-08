<?php
    function mostrarFormulario() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="ej32.php" method="post">
                <label for="inputName">Nombre: <input type="text" name="nombre" id="inputName"></label>
                <label for="tarea">Comentario: <textarea name="texto" id="tarea"></textarea></label>
                <input type="submit" value="Enviar" name="enviar">
            </form>
        </body>
        </html>
        <?php
    }
    mostrarFormulario();
?>