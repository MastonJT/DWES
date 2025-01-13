<?php
include "functions.php";
session_name("Ej2PDO2223");
session_start();
validateSession();
include "dbFunctions.php";

if (isset($_REQUEST["addContact"])) {
    echo insertRecord($_REQUEST["name"], $_REQUEST["surname"]);
}
printPage(["HTMLSnippets/navBox.php", "HTMLSnippets/addContactForm.php"]);
