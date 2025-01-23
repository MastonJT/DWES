<?php
if (isset($_REQUEST['confirmarModificacion'])) {
    modifyContact($_REQUEST['idContact'], $_REQUEST['inNom'], $_REQUEST['inApe']);
} elseif (isset($_REQUEST['modificar']) && !empty($_REQUEST['modificarCon'])) {
?>
    <form action="modificar.php" method="post">
        <label for="idInNom">Nuevo nombre</label><input type="text" name="inNom" id="idInNom">
        <label for="idInApe">Nuevo apellido</label><input type="text" name="inApe" id="idInApe">
        <input type="hidden" value="<?php echo $_REQUEST['modificarCon']; ?>" name="idContact">
        <input type="submit" value="modificar" name="confirmarModificacion">
    </form>
<?php
} elseif (isset($_REQUEST['modificar']) && empty($_REQUEST['modificarCon'])) {
    echo "<p style='color: red;'>No se ha seleccionado ningun contacto.</p>";
} else {
    $table = ["<table>", "</table>"];
    $thead = ["<thead>", "</thead>"];
    $tbody = ["<tbody>", "</tbody>"];
    $tr = ["<tr>", "</tr>"];
    $td = ["<td>", "</td>"];
    $th = ["<th>", "</th>"];
    $output = "";
    $result = selectAllContactos();
    $colCount = $result->columnCount();
    //construccion de la tabla
    //cabecera
    $output .= "<form action='modificar.php' method='post'>";
    $output .= $table[0] . $thead[0] . $tr[0];
    $output .= $th[0] . "Modificar" . $th[1];
    for ($i = 0; $i < $colCount; $i++) {
        $colName = $result->getColumnMeta($i)['name'];
        $output .= $th[0] . "<a href='modificar?col=$colName&ord=desc'> ↓ </a>" . $colName . "<a href='modificar?col=$colName&ord=asc'> ↑ </a>" . $th[1];
    }
    $output .= $tr[1] . $thead[1] . $tbody[0];
    //cuerpo
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $output .= $tr[0] . $td[0] . "<input type='radio' name='modificarCon' value='modificar" . $row['id'] . "'>" . $td[1];
        foreach ($row as $cell) {
            $output .= $td[0] . $cell . $td[1];
        }
        $output .= $tr[1];
    }
    $output .= $tbody[1] . $table[1];
    $output .= "<input type='submit' value='Modificar' name='modificar'></input>";

    echo $output;
}
