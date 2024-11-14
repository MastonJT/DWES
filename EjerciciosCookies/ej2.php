<?php
if (!isset($_COOKIE['galleta'])) {
    setcookie('galleta',1,time()+3600);
}