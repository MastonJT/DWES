<?php
include "functions.php";
session_name("Ej2PDO2223");
session_start();
validateSession();
include "dbFunctions.php";
if (isset($_REQUEST['confirmarBorrado'])) {
    if (isset($_REQUEST['borrar'])) {
        removeRecord($_REQUEST['borrar']);
    } else {
        echo "<p style='color: red;'>No se ha seleccionado nada para borrar.</p>";
    }
}
printPage(["HTMLSnippets/navBox.php", "HTMLSnippets/remContact.php"]);
