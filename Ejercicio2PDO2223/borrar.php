<?php
include "functions.php";
session_name("Ej2PDO2223");
session_start();
validateSession();
include "dbFunctions.php";
if (isset($_REQUEST['confirmarBorrado'])) {
    removeRecord($_REQUEST['borrar']);
}
printPage(["HTMLSnippets/navBox.php", "HTMLSnippets/remContact.php"]);
