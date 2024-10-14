<?php
    if (isset($_REQUEST['enviar'])) {
        //comprobaciones de existencia
        if ($_REQUEST['nombre']==""&&$_REQUEST['apellidos']=="") {
            print "No se ha escrito ni el nombre ni el apellido";
        }elseif ($_REQUEST['nombre']==""&&!($_REQUEST['apellidos']=="")) {
            print "No se ha escrito ningun nombre";
        }elseif ($_REQUEST['apellidos']==""&&!($_REQUEST['nombre']=="")) {
            print "No se ha escrito ningun apellido";
        }else{
            print "Su nombre es {$_REQUEST['nombre']} y sus apellidos son {$_REQUEST['apellidos']}";
        }
    }else {
?>
<form action="ej1.php" method="post">
    <label for="nom">Escriba su nombre:</label>
    <input type="text" name="nombre" id="nom"><br>
    <label for="ape">Escriba sus apellidos:</label>
    <input type="text" name="apellidos" id="ape"><br>
    <button type="submit" name="enviar" value="enviado">Enviar</button>
    <button type="reset">Resetear</button>
</form>
<?php
    }
?>