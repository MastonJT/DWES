<?php
//Pantalla de autenticacion
include "funciones.php";
session_start();

$invalidCredentialsText = "";

if (isset($_SESSION['logIn'])) {
    header("Location: ej1.php");
    exit;
} else if (isset($_REQUEST['logIn'])) {
    $name = $_REQUEST['name'];
    $pass = $_REQUEST['password'];
    if ($name == "admin" && $pass = "admin") {
        $_SESSION['logIn'] = "1";
        header("location: ej1.php");
        exit;
    } else {
        $invalidCredentialsText = "<p>Cedenciales invalidas.</p>";
        printLogInForm();
    }
} else {
    printLogInForm();
}
function printLogInForm()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <style>
            p {
                color: red;
            }
        </style>
    </head>

    <body>
        <form action="ej2.php" method="post">
            <label for="inputName">User: <input type="text" name="name" id="inputName"></label>
            <label for="inputPass">Password: <input type="password" name="password" id="inputPassword"></label>
            <?php global $invalidCredentialsText;
            echo $invalidCredentialsText; ?>
            <input type="submit" value="Log In" name="logIn">
        </form>
    </body>

    </html>
<?php
}
