<?php
include "funciones.php";

session_start();
$invalidCredentialsText = "";


if (isset($_SESSION['logIn'])) {
    header("Location: ej2.php");
    exit;
} else if (isset($_REQUEST['logIn'])) {
    $name = $_REQUEST['name'];
    $pass = $_REQUEST['password'];
    if ($name == "admin" && $pass == "admin") {
        $_SESSION['logIn'] = "1";
        //CREAR BD por defecto
        $connection = conectarBDD();

        $query = "DROP DATABASE IF EXISTS agenda";
        $connection->query($query);
        $query = "CREATE schema agenda";
        clg($query);
        $connection->query($query);
        $query = "USE agenda";
        $connection->query($query);

        $query = "CREATE TABLE personas (" .
            "id INT PRIMARY KEY AUTO_INCREMENT," .
            "nombre VARCHAR(15) NOT NULL," .
            "apellidos VARCHAR(25) NOT NULL," .
            "direccion CHAR(25) NOT NULL," .
            "telefono INT(9) NOT NULL)";
        $connection->query($query);
        sleep(2);
        header("location: ej2.php");
        exit;
    } else {
        $invalidCredentialsText = "<p>Cedenciales invalidas.</p>";
        printLogInForm();
    }
} else {
    clg("1");
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
        <form action="ej2_login.php" method="post">
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
