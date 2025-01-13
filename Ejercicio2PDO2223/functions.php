<?php

function printPage($printableContent)
{
    //Esta funcion recursiva toma un array/string/funcion de cosas que generan/poseen contenido HTML y las ejecuta en orden
    function generateBodyContents($printableContent)
    {
        switch (gettype($printableContent)) {
            case 'array':
                foreach ($printableContent as $element) {
                    generateBodyContents($element);
                }
                break;
            case 'string':
                include $printableContent;
                break;
            default:
                if (is_callable($printableContent)) {
                    $printableContent();
                } else {
                    echo "Parametros de generacion de pagina invalidos.",
                    exit();
                }
                break;
        }
    }
    include "HTMLSnippets/upperPage.php";
    generateBodyContents($printableContent);
    include "HTMLSnippets/lowerPage.php";
}

function validarSanear($data)
{
    if ($data == "") {
        return false;
    } else {
        return htmlspecialchars(trim(strip_tags($data)), ENT_QUOTES, 'UTF-8');
    }
}

function validateSession()
{
    if (isset($_SESSION) && isset($_SESSION['usr']) && $_SESSION['usr'] == 'admin' && $_SESSION['psw'] == 'admin') {
        return true;
    } else {
        header("Location: login.php");
        exit();
    }
}
