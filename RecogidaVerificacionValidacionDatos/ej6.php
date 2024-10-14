<?php
if (isset($_REQUEST['enviar'])) {
    //hacer cosas
    //valirdar nombre
    $errNom="";
    if (isset($_REQUEST['nombre'])=="") {
        $errNom="<p style=\"color: red\">Campo nombre vacio.</p>";
    }
    //validar apel
    $errApe="";
    if (isset($_REQUEST['nombre'])=="") {
        $errNom="<p style=\"color: red\">Campo apellido vacio.</p>";
    }
    //validar edad
    
    $errEdad="";
    switch ($_REQUEST['edades']) {
            case 0:print "Sin seleccionar";break;
            case 1:print "Es menor de 20";break;
            case 2:print "Es entre 20 y 39";break;
            case 3:print "Es entre 40 y 59";break;
            case 4:print "Es mayor de 60";break;
            default:print "Kha pasau?";break;
        }
    //validar peso
    //validar sexo
    //validar estado civil
    //validar aficiones
} else {
    //imprimir formulario
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
        <form action="ej6.php" method="post">
            <label for="nom">Nombre:</label>
            <label for="ape">Apellidos:</label>
            <label for="edad">Seleccione edad:</label>
            <br>
            <input type="text" name="nombre" id="nom">
            <input type="text" name="ape" id="ape">
            <select name="edades" id="edad">
                <option value="0">...</option>
                <option value="1">menor de 20</option>
                <option value="2">entre 20 y 39</option>
                <option value="3">entre 40 y 59</option>
                <option value="4">60 años o mas</option>
            </select>
            <br>
            <div>
            <label for="pes">Peso</label>
            <br>
            <input type="number" name="peso" id="pes">
            </div>
            <div>
            <label>Sexo</label>
            <br>
            <label for="hom">Hombre:</label>
            <input type="radio" name="sex" id="hom" >
            <label for="muj">Mujer:</label>
            <input type="radio" name="sex" id="muj">
            </div>
            <div>
            <label>Estado civil</label>
            <br>
            <label for="soltero">Soltero:</label>
            <input type="radio" name="estCiv" id="soltero">
            <label for="casado">Casado:</label>
            <input type="radio" name="estCiv" id="casado">
            <label for="otro">Otro:</label>
            <input type="radio" name="estCiv" id="otro">
            </div>
            <br>
            <label for="">Aficiones</label>
            <br>
            <label for="cin">Cine</label>
            <input type="checkbox" name="cine" id="cin">
            <label for="lit">Literatura</label>
            <input type="checkbox" name="literatura" id="lit">
            <label for="teb">Tebeos</label>
            <input type="checkbox" name="tebeos" id="teb">
            <br>
            <label for="dep">Deporte</label>
            <input type="checkbox" name="deporte" id="dep">
            <label for="mus">Musica</label>
            <input type="checkbox" name="musica" id="mus">
            <label for="tel">Television</label>
            <input type="checkbox" name="television" id="tel">
            <br>
            <button type="submit" name="enviar">Enviar</button>
        </form>
    </body>
    </html>
    <?php
};
?>