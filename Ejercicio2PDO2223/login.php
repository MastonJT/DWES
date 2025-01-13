<?php
include "functions.php";
session_name("Ej2PDO2223");
session_start();
if (isset($_SESSION['usr']) && $_SESSION['usr'] == 'admin' && $_SESSION['psw'] == 'admin') {
    //redirigir si ya esta iniciada la sesion
    header("Location: index.php");
    exit();
} elseif (isset($_REQUEST['logInAttempt'])) {
    //verificar intento de inicio de sesion
    $usr = validarSanear($_REQUEST["usr"]);
    $psw = validarSanear($_REQUEST["psw"]);
    if ($usr == "admin" && $psw == "admin") {
        $_SESSION["usr"] = "admin";
        $_SESSION["psw"] = "admin";
        //Generar base de datos inicial
        require "dbFunctions.php";
        createInitialDB();
        header("Location: index.php");
        exit();
    }
} else {
    //generar pagina de inicio de session
    printPage("HTMLSnippets/logInForm.php");
}
