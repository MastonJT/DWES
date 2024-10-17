<?php
    if (isset($_REQUEST['enviar'])) {
        //verificaciones
        $texto="";
        if ($_REQUEST['nombre']=="") 
            $texto.="<p style=\"color: red;\">Campo nombre esta vacío.</p>";
        elseif (!preg_match('/^[a-zñáéíóú\s\-]+$/i',$_REQUEST['nombre'])) 
            $texto.="<p style=\"color: red;\">Campo nombre contiene caractéres inválidos.</p>";
        else 
            $texto.="<p>Su nombre es {$_REQUEST['nombre']}</p>";
        
        if ($_REQUEST['apellidos']=="") 
            $texto.="<p style=\"color: red;\">Campo apellidos esta vacío.";
        elseif (!preg_match('/^[a-zñáéíóú\s\-]+$/i',$_REQUEST['apellidos'])) 
            $texto.="<p style=\"color: red;\">Campo apellidos contiene caractéres inválidos.</p>";
        else 
            $texto.="<p>Sus apellidos son {$_REQUEST['apellidos']}</p>";
        
        if ($_REQUEST['email']=="") 
            $texto.="<p style=\"color: red;\">Campo email esta vacío.</p>";
        elseif (!preg_match('/^[a-z0-9\.\_]+[@][a-z0-9\.\_]+[\.][a-z]+$/i',$_REQUEST['email'])) 
            $texto.="<p style=\"color: red;\">Campo email tiene formato inválido.</p>";
        else 
            $texto.="<p>Su email es {$_REQUEST['email']}</p>";
        
        if ($_REQUEST['contraseña']=="") 
            $texto.="<p style=\"color: red;\">Campo contraseña esta vacío.</p>";
        else 
            $texto.="<p>Su contraseña es {$_REQUEST['contraseña']}</p>";
        
        if (!isset($_REQUEST['sexo'])) 
            $texto.="<p style=\"color: red;\">Sexo no especificado.</p>";
        else 
            $texto.="<p>Su sexo es {$_REQUEST['sexo']}</p>";
        
        if(!isset($_REQUEST['estudios']))
            $texto.="<p style=\"color: red;\">Estudios no especificado.</p>";
        else 
            $texto.="<p>Sus estudios son {$_REQUEST['estudios']}</p>";
        
        if ($_REQUEST['dia']==-1) 
            $texto.="<p style=\"color: red;\">Dia recibiemiento no especificado.</p>";
        else 
            $texto.="<p>Dia recibimiento especificado: {$_REQUEST['dia']}</p>";
        
        if (!isset($_REQUEST['checkbox'])) 
            $texto.="<p>Ninguna preferencia seleccionada.</p>";
        else {
            $texto.="<p>Las preferencias son: ";
            foreach ($_REQUEST['checkbox'] as $valor) 
                if (isset($valor)) 
                    $texto.=$valor.", ";
            $texto.="</p>";
        }
        if ($_REQUEST['opinion']=="") 
            $texto.="<p style=\"color: red;\">Opinion inexistente.</p>";
        else 
            $texto.="<p>Su opinión: {$_REQUEST['opinion']}</p>";
        print $texto;
    }
     else 
        imprimirPaginaInicial();
    
    

    function imprimirPaginaInicial(){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .contenedorRow{
                display:flex;
            }
        </style>
    </head>
    <body>
        <form action="ej7.php" method="POST">
            <div>
                <label for="1">Nombre</label>
                <input type="text" name="nombre" id="1">
                <label for="2">Apellidos</label>
                <input type="text" name="apellidos" id="2">
                <label for="3">Email</label>
                <input type="text" name="email" id="3">
                <label for="4">Contraseña</label>
                <input type="password" name="contraseña" id="4">
            </div>
            <div style="display:flex">
                <div style="display:flex; flex-direction:column;">
                    <p>Sexo</p>
                    <div class="contenedorRow">
                        <input type="radio" name="sexo" id="5" value="hombre">
                        <label for="5">Hombre</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="radio" name="sexo" id="6" value="mujer">
                        <label for="6">Mujer</label>
                    </div>
                </div>
                <div style="display:flex; flex-direction:column;">
                    <p>Nivel de estudios</p>
                    <div class="contenedorRow">
                        <input type="radio" name="estudios" id="7" value="Certificado escolar">
                        <label for="7">Certificado escolar</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="radio" name="estudios" id="8" value="Graduado E.S.O.">
                        <label for="8">Graduado E.S.O.</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="radio" name="estudios" id="9" value="Bachiller - Formación Profresional">
                        <label for="9">Bachiller - Formación Profresional</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="radio" name="estudios" id="10" value="Diplomado">
                        <label for="10">Diplomado</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="radio" name="estudios" id="11" value="Licenciado o Doctorado">
                        <label for="11">Licenciado o Doctorado</label>
                    </div>
                </div>
                <div style="display:flex; flex-direction:column;">
                    <p>Interesado en los siguientes temas</p>
                    <div class="contenedorRow">
                        <input type="checkbox" name="checkbox[]" id="12" value="Musica">
                        <label for="12">Musica</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="checkbox" name="checkbox[]" id="13" value="Deporte">
                        <label for="13">Deporte</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="checkbox" name="checkbox[]" id="14" value="Cine">
                        <label for="14">Cine</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="checkbox" name="checkbox[]" id="15" value="Libros">
                        <label for="15">Libros</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="checkbox" name="checkbox[]" id="16" value="Ciencia">
                        <label for="16">Ciencia</label>
                    </div>
                </div>
            </div>
            <div>
                <label for="diaSemana">Dia de la semana que le interesa recibirlo</label>
                <select name="dia" id="diaSemana">
                    <option value="-1">...</option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miercoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sabado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                </select>
            </div>
            <div>
                <label for="Opinion">Su opinión</label>
                <textarea name="opinion" id="Opinion" placeholder="Comentario:..."></textarea>
            </div>
            <input type="submit" value="Enviar" name="enviar">
            <input type="reset" value="Resetear">
        </form>

    </body>
    </html>
    <?php
    }
?>