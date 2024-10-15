<?php
if (isset($_REQUEST['enviar'])) {
    //hacer cosas
    //valirdar nombre
    $texto="";
    if (isset($_REQUEST['nombre'])) {
        if($_REQUEST['nombre']=="")
            $texto.="<p style=\"color: red\">Campo nombre vacio.</p>";
        elseif (preg_match('/[^a-zñáéíóú\-\s]/i',$_REQUEST['nombre']))
            $texto.="<p style=\"color: red\">Campo nombre contiene caracteres inválidos.</p>";
        else {
            $texto.="<br/>Tu nombre es: {$_REQUEST['nombre']}";
        }
    }else {
        $texto.="<br/>No se encuentra el nombre";
    }
    //validar apel
    if (isset($_REQUEST['ape'])) {
        if($_REQUEST['ape']=="")
            $texto.="<p style=\"color: red\">Campo apellido vacio.</p>";
        elseif (preg_match('/[^a-zñáéíóú\-\s]/i',$_REQUEST['ape']))
            $texto.="<p style=\"color: red\">Campo apellido contiene caracteres inválidos.</p>";
        else {
            $texto.="<br/>Tu apellido es: {$_REQUEST['ape']}";
        }
    }else {
        $texto.="<br/>No se encuentra el apellido";
    }
    //validar edad
    if (isset($_REQUEST['edades'])) {
        switch ($_REQUEST['edades']) {
            case 0:$texto.= "<p style=\"color: red\">Edad in seleccionar</p>";break;
            case 1:$texto.= "<br/>Tu edad es: Es menor de 20";break;
            case 2:$texto.= "<br/>Tu edad es: Es entre 20 y 39";break;
            case 3:$texto.= "<br/>Tu edad es: Es entre 40 y 59";break;
            case 4:$texto.= "<br/>Tu edad es: Es mayor de 60";break;
            default:$texto.= "<p style=\"color: red\">Kha pasau?</p>";break;
        } 
    }else {
        $texto.="<br/>No se encuentra la edad";
    }
    //validar peso
    if (isset($_REQUEST['peso'])) {
        if ($_REQUEST['peso']=="") {
            $texto.="<p style=\"color: red\">Campo peso vacío.</p>";
        }elseif (is_numeric($_REQUEST['peso'])) {
            $texto.="<p style=\"color: red\">Campo peso no es númerico.</p>";
        }
    } else {
        $texto.="<br/>No se encuentra el peso";
    }
    
    //validar sexo
    if (isset($_REQUEST['sex'])) {
        if ($_REQUEST['sex']=="") {
            $texto.="<p style=\"color: red\">Sexo sin seleccionar</p>";
        }else {
            $texto.="<br/>Sexo: ";
        }
    } else {
        $texto.="<br/>No se encuentra el sexo";
    }
    
    //validar estado civil
    if (isset($_REQUEST['estCiv'])) {
        if ($_REQUEST['estCiv']=="") {
            $texto.="<p style=\"color: red\">Estado civil sin seleccionar</p>";
        }else {
            $texto.="<br/>Estado civil: {$_REQUEST['estCiv']}";
        }
    } else {
        $texto.="<br/>No se encuentra el estado civil";
    }
    
    //validar aficiones
    if (isset($_REQUEST['cine'])) {
        if ($_REQUEST['cine']!="") {
            $texto.="<br/>Le gusta el cine";
        }
    } else {
        $texto.="<br/>No se encuentra el cine";
    }
    if (isset($_REQUEST['literatura'])) {
        if ($_REQUEST['literatura']!="") {
            $texto.="<br/>Le gusta el literatura";
        }
    } else {
        $texto.="<br/>No se encuentra el literatura";
    }
    if (isset($_REQUEST['tebeos'])) {
        if ($_REQUEST['tebeos']!="") {
            $texto.="<br/>Le gusta el tebeos";
        }
    } else {
        $texto.="<br/>No se encuentra el tebeos";
    }
    if (isset($_REQUEST['deporte'])) {
        if ($_REQUEST['deporte']!="") {
            $texto.="<br/>Le gusta el deporte";
        }
    } else {
        $texto.="<br/>No se encuentra el deporte";
    }
    if (isset($_REQUEST['musica'])) {
        if ($_REQUEST['musica']!="") {
            $texto.="<br/>Le gusta el musica";
        }
    } else {
        $texto.="<br/>No se encuentra el musica";
    }
    if (isset($_REQUEST['television'])) {
        if ($_REQUEST['television']!="") {
            $texto.="<br/>Le gusta el television";
        }
    } else {
        $texto.="<br/>No se encuentra el television";
    }
    echo $texto;
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
            <div style="display:flex; gap:1rem;">
                <div>
                    <label for="nom">Nombre:</label>
                    <br>
                    <input type="text" name="nombre" id="nom">
                </div>
                <div>
                    <label for="ape">Apellidos:</label>
                    <br>
                    <input type="text" name="ape" id="ape">
                </div>
                <div>
                    <label for="edad">Seleccione edad:</label>
                    <br>
                    <select name="edades" id="edad">
                        <option value="0">...</option>
                        <option value="1">menor de 20</option>
                        <option value="2">entre 20 y 39</option>
                        <option value="3">entre 40 y 59</option>
                        <option value="4">60 años o mas</option>
                    </select>
                </div>
            </div>
            <br>
            <div style="display:flex; gap:1rem;">
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