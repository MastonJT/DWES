<?php
include "functions.php";
include "dbFunctions.php";
if (isset($_SESSION) && session_name() == "Ej2PDO2223") {
    header("Location: index.php");
    exit();
} elseif (isset($_REQUEST['logInAttempt'])) {
    $usr = validarSanear($_REQUEST["usr"]);
    $psw = validarSanear($_REQUEST["psw"]);
    if ($usr == "admin" && $psw == "admin") {
        require "dbConfig.php";
        startSession();
        createDB("agenda", $connection);
        header("Location: index.php");
        exit();
    }
} else {
    printPage(['printLogInForm']);
}
function printLogInForm()
{
    echo "<form action='login.php' method='post'>" .
        "<label>User: <input type='text' name='usr'></label>" .
        "<label>Password: <input type='password' name='psw'></label>" .
        "<input type='submit' value='Log In' name='logInAttempt'>" .
        "</form>";
}
