<?php
    //variables de impresion
    $extNombre="nulo";
    $extDestino="nulo";
    $extDuracion="nulo";
    $extSalida="nulo";
    $errCircuito=false;
    $errDestino=false;
    $errDuracion=false;
    $errDiasSalida=false;
    $contenidoArchivo='';
    if (isset($_REQUEST['enviar'])) {
        //validacion forumario
        $circuito=sanear($_REQUEST['circuito']);
        $destino=sanear($_REQUEST['destino']);
        $duracion=sanear($_REQUEST['duracion']);
        $diasSalida=sanear($_REQUEST['diasSalida']);
        $regexCircuitoDestno='/^[a-zñàèìòù\s\-]+$/i';
        $regexDiasSalida='/^[a-z\s]+$/i';
        $regexDuracion='/^[0-9]+$/';
        if (!regex($regexCircuitoDestno,$circuito)) {$errCircuito=true;}
        if (!regex($regexCircuitoDestno,$destino)) {$errDestino=true;}
        if (!regex($regexDuracion,$duracion)) {$errDuracion=true;}
        if (!regex($regexDiasSalida,$diasSalida)) {$errDiasSalida=true;}
        //si no hay error, guardar en el fichero
        if (!($errCircuito||$errDestino||$errDuracion||$errDiasSalida)) {
            global$contenidoArchivo;
            $contenidoArchivo=file_get_contents("viajes.txt");
            //crear cadena nueva a anexar
            $cadena=$circuito.":".$destino.":".$duracion.":".$diasSalida."\n";
            $contenidoArchivo.=$cadena;
            //escritura
            $archivo=fopen("viajes.txt","w");
            fwrite($archivo,$contenidoArchivo);
            fclose($archivo);
        }
        //regenerar pagina
        imprimirHTMLInicioBody();
        imprimirTabla();
        imprimirFormulario();
        imprimirHTMLFinBody();
        $errCircuito=false;
        $errDestino=false;
        $errDuracion=false;
        $errDiasSalida=false;
    }else {
        //crear archivo vacio
        $archivo=fopen("viajes.txt","w");
        fclose($archivo);
        imprimirHTMLInicioBody();
        imprimirFormulario();
        imprimirHTMLFinBody();
    }
    
    function imprimirTabla(){
        global$contenidoArchivo;
        if ($contenidoArchivo!="") {
            ?>
            <table>
                <thead>
                    <td>Nombre</td>
                    <td>Destino</td>
                    <td>Duracion</td>
                    <td>Salida</td>
                </thead>
                <?php
                //leer datos del fichero
                $datos=file_get_contents('viajes.txt');
                //serparar en array de formualripos
                $datos=explode("\n",$datos);
                foreach ($datos as $dato) {
                    //seprar el formulario en datos
                    $dato=explode(':',trim($dato,"\n"));
                    if (!empty($dato)) {
                        ?>
                        <tr>
                            <td><?php print $dato[0];?></td>
                            <td><?php print $dato[1];?></td>
                            <td><?php print $dato[2];?></td>
                            <td><?php print $dato[3];?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
            <?php
        }
    }

    function imprimirFormulario() {
        ?>
        <form action="ej1.php" method="post">
            <label for="cir">Introduzca el nombre del circuito: </label>
            <input type="text" name="circuito" id="cir">
            <?php
                global $errCircuito;
                if ($errCircuito) {
                    ?><p>El campo circuito esta vacio o contiene caracteres invalidos.</p><?php
                }
            ?>
            <br>
            <label for="des">Introduzca el destino: </label>
            <input type="text" name="destino" id="des">
            <?php
                global $errDestino;
                if ($errDestino) {
                    ?><p>El campo destino esta vacio o contiene caracteres invalidos.</p><?php
                }
            ?>
            <br>
            <label for="dur">Introduzca la duracion: </label>
            <input type="text" name="duracion" id="dur">
            <?php
                global $errDuracion;
                if ($errDuracion) {
                    ?><p>El campo duracion esta vacio o contiene caracteres invalidos.</p><?php
                }
            ?>
            <br>
            <label for="dia">Introduzca los dias de salida: </label>
            <input type="text" name="diasSalida" id="dia">
            <?php
                global $errDiasSalida;
                if ($errDiasSalida) {
                    ?><p>El campo dias salida esta vacio o contiene un formato invalido.</p><?php
                }
            ?>
            <br>
            <input type="submit" value="Enviar" name="enviar">
            <input type="reset" value="volver" name="volver">
        </form>
        <?php
    }

    function imprimirHTMLInicioBody() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                table, td{
                    background-color: purple;
                    border: 1px solid black;
                    font-weight: bolder;
                    font-family: Arial, Helvetica, sans-serif;
                }
                p{
                    color: red;
                }
            </style>
        </head>
        <body> 
        <?php
    }
    function imprimirHTMLFinBody() {
        ?>
        </body>
        </html>    
        <?php
    }

    function sanear($texto){
        return htmlspecialchars(trim(strip_tags($texto)),ENT_QUOTES,'UTF-8');
    }

    function regex($regex,$texto){
        return preg_match($regex,$texto);
    }
?>