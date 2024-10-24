<?php
    /*Todo el manejo de ficheros en parte php esta hecho con apuntes*/
    if (isset($_REQUEST['enviar'])&&isset($_FILES['archivo'])) {
        //procesar
        $textoErr="Datos no validos o sospechosos en los siguientes controles";
        $todoCorrecto=true;
        //variables
        $nombre=sanear($_REQUEST['nombre']);
        $apellido=sanear($_REQUEST['apellido']);
        $edad=sanear($_REQUEST['edad']);
        $telefono=sanear($_REQUEST['telefono']);
        //sanear

        //validar
        if (!preg_match('/^[a-zñáéíóú]+([\s][a-zñáéíóú]+)*$/i',$nombre)||$nombre==""||strlen($nombre)>12) {
            $textoErr.="<br/>Nombre: formato invalido, campo vacio o cadena superior a 12 caracteres.";
            $todoCorrecto=false;
        }
        if (!preg_match('/^[a-zñáéíóú]+([\s][a-zñáéíóú]+)*$/i',$apellido)||$apellido==""||strlen($apellido)>18) {
            $textoErr.="<br/>Apellido: formato invalido, campo vacio o cadena superior a 18 caracteres.";
            $todoCorrecto=false;
        }
        if (!is_numeric($edad)) {
            $textoErr.="<br/>Edad: no es un valor numerico.";
            $todoCorrecto=false;
        }
        if (!preg_match('/^[69][0-9]{8}$/',$telefono)) {
            $textoErr.="<br/>Telefono: formato invalido.";
            $todoCorrecto=false;
        }
        $errorArchivo="";
        $tipo=$_FILES['archivo']['type'];
        $tamano=$_FILES['archivo']['size'];
        $nombreArc=$_FILES['archivo']['name'];
        $nombreTemp=$_FILES['archivo']['tmp_name'];
        $err=$_FILES['archivo']['error'];
        $directorioFinal="definitivo/";
        $exitoSubirArchivo="";
        if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
            if ($tipo!='image/x-png') {
                $exitoSubirArchivo="Formato de imagen no valido";
            }elseif (!move_uploaded_file($directorioFinal.$nombreArc)) {
                $exitoSubirArchivo="Se ha producido un error al alocar le archivo";
            }else {
                $nombreCompleto=$directorioFinal.$nombre;
                if (is_file($nombreCompleto)) {
                    $idUnico=time();
                    $nombreCompleto=$directorioFinal.$idUnico."-".$nombreArc;
                }
                move_uploaded_file($nombreTemp,$nombreCompleto);
            }
        }else {
            switch ($err) {
                case '1':$errorArchivo="Archivo supera el tamaño maximo del ini.";break;
                case '2':$errorArchivo="Archivo supera el tamaño maximo del max file size.";break;
                case '3':$errorArchivo="Archivo solo se ha subido parcialmente.";break;
                case '4':$errorArchivo="Archivo no se ha subido.";break;
                case '6':$errorArchivo="Falta la carpeta temporal.";break;
                case '7':$errorArchivo="No se puede subir en el directorio especificado.";break;
                case '8':$errorArchivo="Una exprension de php ha detenido la subida.";break;
                default:$errorArchivo="No se ha podido subir el archivo";break;
            }
        }
        //pantallas sucesivas
        if (!$todoCorrecto) {
            echo $textoErr;
        }elseif (!$errorArchivo=="") {
            echo $errorArchivo;
        } else {
            echo "El archivo se ha subido correctamente y los datos son:
                <br/>Nombre:{$nombre}
                <br/>Apellidos:{$apellido}
                <br/>Edad:{$edad}
                <br/>Telefono:{$telefono}
                <br/>Nombre del archivo:{$nombreArc}
                ";
        }
        
        
    } else {
        //pagina inicio
        imprimirFormulario(); 
    }
    function sanear($parametro){
        return htmlspecialchars(trim(strip_tags($parametro)));
    }
    function imprimirFormulario() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="EjerciciosGlobal.php" method="post" enctype="multipart/form-data">
                <label for="1">Nombre</label>
                <input type="text" name="nombre" id="1">
                <br>
                <label for="2">Apellido</label>
                <input type="text" name="apellido" id="2">
                <br>
                <label for="3">Edad</label>
                <input type="text" name="edad" id="3">
                <br>
                <label for="4">Telefono</label>
                <input type="text" name="telefono" id="4">
                <br>
                <input type="hidden" name="MAX_SIZE_FILE" value=<?php echo $max_file_size=1024;?>>
                <input type="file" name="archivo" id="5">
                <input type="submit" value="Enviar" name="enviar">
            </form>
        </body>
        </html>
        <?php
    }
?>