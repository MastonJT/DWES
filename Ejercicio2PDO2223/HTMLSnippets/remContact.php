<?php
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
$output .= "<form action='borrar.php' method='post'>";
$output .= $table[0] . $thead[0] . $tr[0];
$output .= $th[0] . "Borrar" . $th[1];
for ($i = 0; $i < $colCount; $i++) {
    $colName = $result->getColumnMeta($i)['name'];
    $output .= $th[0] . "<a href='borrar?col=$colName&ord=desc'> ↓ </a>" . $colName . "<a href='borrar?col=$colName&ord=asc'> ↑ </a>" . $th[1];
}
$output .= $tr[1] . $thead[1] . $tbody[0];
//cuerpo
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
    $output .= $tr[0] . $td[0] . "<input type='checkbox' name='borrar[]' value='borrar" . $row['id'] . "'>" . $td[1];
    foreach ($row as $cell) {
        $output .= $td[0] . $cell . $td[1];
    }
    $output .= $tr[1];
}
$output .= $tbody[1] . $table[1];
$output .= "<input type='submit' value='Borrar' name='confirmarBorrado'></input>";

echo $output;
