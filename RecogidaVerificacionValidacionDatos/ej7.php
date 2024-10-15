<?php
    if (isset($_REQUEST['enviar'])) {
        # code...
    } else {
        imprimirPaginaInicial();
    }
    

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
        <form action="ej7.php">
            <div>
                <label for="1">Nombre</label>
                <input type="text" name="nombre" id="1">
                <label for="2">Apellidos</label>
                <input type="text" name="apellidos" id="2">
                <label for="3">Email</label>
                <input type="email" name="email" id="3">
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
                        <input type="checkbox" name="Musica" id="12">
                        <label for="12">Musica</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="checkbox" name="Deporte" id="13">
                        <label for="13">Deporte</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="checkbox" name="Cine" id="14">
                        <label for="14">Cine</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="checkbox" name="Libros" id="15">
                        <label for="15">Libros</label>
                    </div>
                    <div class="contenedorRow">
                        <input type="checkbox" name="Ciencia" id="16">
                        <label for="16">Ciencia</label>
                    </div>
                </div>
            </div>
            <input type="submit" value="Enviar">
            <input type="reset" value="Resetear">
        </form>

    </body>
    </html>
    <?php
    }
?>