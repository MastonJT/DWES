<?php
    if (isset($_REQUEST['enviar'])) {
        switch ($_REQUEST['edades']) {
            case 0:print "Sin seleccionar";break;
            case 1:print "Es menor de 20";break;
            case 2:print "Es entre 20 y 39";break;
            case 3:print "Es entre 40 y 59";break;
            case 4:print "Es mayor de 60";break;
            default:print "Kha pasau?";break;
        }
    } else {
        imprimirPagina();
    }
    function imprimirPagina(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="ej5.php" method="post">
                <label for="selector">Seleccione edad</label>
                <select name="edades" id="selector">
                    <option value="0">...</option>
                    <option value="1">menor de 20</option>
                    <option value="2">entre 20 y 39</option>
                    <option value="3">entre 40 y 59</option>
                    <option value="4">60 años o mas</option>
                </select>
                <button type="submit" name="enviar">Enviar</button>
            </form>
        </body>
        </html>
        <?php
    }
    
?>