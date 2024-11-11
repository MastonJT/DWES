<?php
//manejar directorio
$directorio = './img';
$dirHandler = opendir($directorio) or die("No se pudo abrir el directorio de las imagenes");
echo "Abierto el directorio original<br/>";

//crear archivo
$archivo = "listaImagenes.txt";
$streamArchivo = fopen($archivo, 'w') or die("No se pudo abrir o crear el archivo de escritura.");
echo "creado archivo para lista de imagenes<br/>";

//tomar imagenes del dir
while ($elemento = readdir($dirHandler)) {
    if (!is_dir($elemento)) {
        $cadena = $elemento . "-" . filesize($directorio.'/'.$elemento) . "\n";
        fwrite($streamArchivo, $cadena);
        echo "Escrita imagen $cadena<br/>";
    }
}
fclose($streamArchivo);
echo "escritas imagenes y cerrado steam de escritura<br/>";

//crear nuevo directorio
$directorioNuevo = "imgNuevo";
if (!is_dir($directorioNuevo)) {//si no hay directorio lo crea
    mkdir($directorioNuevo) or die("No se pudo crear el directorio");
}
$dirHandler1 = opendir($directorioNuevo) or die("No se pudo abrir el nuevo directorio.");
echo "creado handler para el directorio nuevo<br/>";

//guardar imagenes en nuevo directorio
$streamLectura = fopen($archivo, 'r');
while ($linea = fgets($streamLectura)) {
    echo "Tratando linea $linea<br/>";
    $coincidencias=substr($linea,0,strpos($linea,"-")); //extraer la parte de la linea correspondiente al nombre
    echo "Extraido del fichero $coincidencias<br/>";
    //copiar fichero
    $dirOrginial=$directorio.'/'.$coincidencias;
    $dirFinal=$directorioNuevo.'/'.$coincidencias;
    copy($dirOrginial,$dirFinal);
    echo "Copiado fichero $coincidencias<br/>";
}
