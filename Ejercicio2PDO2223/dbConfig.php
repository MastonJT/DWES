<?php
$dsn = "mysql:host=localhost;charset=utf-8;";
try {
    $connection = new PDO($dsn, "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
