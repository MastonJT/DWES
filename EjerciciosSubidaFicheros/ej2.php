<?php
    if (isset($_REQUEST['enviar'])&&isset($_FILES['imagen'])) {
        
        //sanear y validar nombre
        $mensajeErr="";
        $nombre=sanear($_REQUEST['nombre']);
        if ($_REQUEST['nombre']=="") {
            $mensajeErr.="Campo esta vacio.";
        }elseif (preg_match('/^[a-zñàèìòù]+([\s-][a-zñàèìòù]+)*$/',$nombre)) {
            $mensajeErr.="campo nombre contiene caracteres invalidos";
        }else{
            $mensajeErr.="Nombre del titular: {$mensajeErr}";
        }
        //sanear validar texto
        $texto=sanear($_REQUEST['texto']);
        if ($texto=="") {
            $mensajeErr.="Campo texto esta vacio";
        }else {
            $mensajeErr.="Texto: {$texto}";
        }
        //sanear validar categoria
        $categoria=sanear($_REQUEST['categorias']);
        if (isset($_REQUEST['categorias'])) {
            $mensajeErr.="Categoriaes {$_REQUEST['categorias']}";
        }
        //validar archivo
        
        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {//comprueba si se ha subido
            $nombresArchivo=pathinfo($_FILES['imagen']['name']);
            $regexTipo="/^(jpeg|jpg|png|gif)$/i";
            if (preg_match($regexTipo,$nombresArchivo['extension'])) {//validar extension
                //crear directiorio
                $directorio='imagenes/'.$nombresArchivo['basename'];
                //verificar si hay algun fichero con el mismo
                if (is_file($directorio)) {
                    //si existe generar nombre unico
                    $directorio='imagenes/'.time()."-".$nombreArchivo['basename'];
                }
                //guardar el archivo en el directorio
                move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio);
                $mensajeErr.="Fichero subido con exito";
                $mensajeErr.="<img src='$directorio'/>";
            }else {
                $mensajeErr.="Extension invalida";
            }
        }else {
            switch ($_FILES['imagen']['error']) {//codigos de error
                case 1:print('Error de tamano maximo en php.ini.');break;
                case 2:print('Error de tamano por max file.');break;
                case 3:print('Subido parcialmente');break;
                case 4:print('No se ha subido el fichero, no ha llegado a subirse.');break;
                case 6:print('Sin carpeta temporal.');break;
                case 7:print('No se puede escribir.');break;
                case 8:print('Extension php detenida por la subida.');break;
                default:print("No se ha subido el archivo");break;
            }
        }
    }else {//enviar formulario
        imprimirFormulario();
    }
function sanear($texto) {
    return htmlspecialchars(trim(strip_tags($texto)),ENT_QUOTES,"utf-8");
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
        <form action="ej2.php" method="post" enctype="multipart/form-data">
            <h3>Insertar nueva noticia.</h3>
            <label for="nom">Nombre:</label>
            <input type="text" name="nombre" id="nom">
            <label for="test">Texto:</label>
            <textarea name="texto" id="test"></textarea>
            <select name="categorias" id="">
                <option value="costas">costas</option>
                <option value="mares">mares</option>
                <option value="playas">playas</option>
            </select>
            <label for="img">Imagen</label>
            <input type="file" name="imagen" id="img">
            <input type="submit" value="Enviar" name="enviar">
        </form>
    </body>
    </html>
<?php
}
?>
