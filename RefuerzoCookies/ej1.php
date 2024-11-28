<?php
if (isset($_REQUEST['enviar'])) {
    if (!isset($_COOKIE['galleta'])) {
        if (isset($_REQUEST['aeropuertos'])) {
            $aeropuertos = implode("-", $_REQUEST['aeropuertos']);
        } else {
            $aeropuertos = "azul";
        }
        setcookie("galleta", $_REQUEST['usuario'] . "--" . $_REQUEST['asiento'] . "--" . $_REQUEST['menu'] . "-_-" . $aeropuertos, time() + 3600);
    } else {
        $migas = explode("--", $_COOKIE['galleta']);
    }
    imprimirForumlario();
} else {
    imprimirForumlario();
}
function imprimirForumlario()
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
        <form action="ej1.php" method="post" style="display: flex; flex-direction:column;">
            <label for="idUsu">Nombre usuario: <input type="text" name="usuario" id="idUsu"></label>
            <label for="idAsiento">Asiento: <select name="asiento" id="idAsiento">
                    <option value="Pasillo">Pasillo</option>
                    <option value="Ventanilla">Ventanilla</option>
                    <option value="Centro">Centro</option>
                </select></label>
            <label for="idMenu">Menu: <select name="menu" id="idMenu">
                    <option value="Vegetariano">Vegetariano</option>
                    <option value="No vegetariano">No vegetariano</option>
                    <option value="Diabetico">Diabetico</option>
                    <option value="Infantil">Infantil</option>
                </select></label>
            <label for="" style="display: flex;flex-direction:column;">Aeropuertos de interes:
                <label><input type="checkbox" name="aeropuertos[]" value="Londres">Londres</label>
                <label><input type="checkbox" name="aeropuertos[]" value="Paris">Paris</label>
                <label><input type="checkbox" name="aeropuertos[]" value="Roma">Roma</label>
                <label><input type="checkbox" name="aeropuertos[]" value="Ibiza">Ibiza</label>
                <label><input type="checkbox" name="aeropuertos[]" value="Singapur">Singapur</label>
                <label><input type="checkbox" name="aeropuertos[]" value="Hong Kong">Hong Kong</label>
                <label><input type="checkbox" name="aeropuertos[]" value="Malta">Malta</label>
                <label><input type="checkbox" name="aeropuertos[]" value="Bombay">Bombay</label>
            </label>
            <input type="submit" value="enviar" name="enviar">
        </form>
    </body>

    </html>
<?php
}
