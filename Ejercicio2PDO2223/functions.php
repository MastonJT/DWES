<?php

function printUpperPage()
{
    echo "<!DOCTYPE html>" .
        "<html lang='en'>" .
        "<head>" .
        "<meta charset='UTF-8'>" .
        "<meta name='viewport' content='width=device-width, initial-scale=1.0'>" .
        "<title>Document</title>" .
        "</head>" .
        "<body>";
}

function printLowerPage()
{
    echo "</body>" .
        "</html>";
}

function printPage($printContent)
{
    printUpperPage();
    foreach ($printContent as $function) {
        $function();
    }
    printLowerPage();
}

function validarSanear($data)
{
    if ($data == "") {
        return false;
    } else {
        return htmlspecialchars(trim(strip_tags($data)), ENT_QUOTES, 'UTF-8');
    }
}

function startSession()
{
    session_name("Ej2PDO2223");
    session_id("Ej2PDO2223" . time());
    session_start();
}

function validateSession()
{
    if (isset($_SESSION)) {
        return true;
    } else {
        header("Location: login.php");
        exit;
    }
}
