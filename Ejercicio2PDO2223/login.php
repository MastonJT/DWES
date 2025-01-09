<?php
include "functions.php";
if (isset($_SESSION)) {
    header("Location: index.php");
} else {
    printPage(['printLogInForm']);
}
function printLogInForm()
{
    echo "<form action='login.php' method='post'>" .
        "<label>User: <input type='text' name='usr'></label>" .
        "<label>Password: <input type='password' name='psw'></label>" .
        "<input type='submit' value='Log In'>" .
        "</form>";
}
