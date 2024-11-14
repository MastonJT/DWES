<?php
setcookie("galleta", "true", time()+3600);
if (isset($_COOKIE['galleta'])) {
    echo "Galleta existe";
} else {
    echo "Galleta no existe";
}
?>