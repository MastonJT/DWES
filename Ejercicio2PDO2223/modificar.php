<?php
include "functions.php";
session_name("Ej2PDO2223");
session_start();
validateSession();
include "dbFunctions.php";


printPage(["HTMLSnippets/navBox.php"]);
include "HTMLSnippets/modifyContactForm.php";
