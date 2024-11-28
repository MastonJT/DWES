<?php
if (!isset($_COOKIE['galleta'])) {
    setcookie('galleta', 0, time() + 3600);
    header("location: ./ej2.php");
    exit;
} else {
    $galleta = intval($_COOKIE['galleta']) + 1;
    setcookie('galleta', $galleta, time() + 3600);
    echo $galleta;
}
