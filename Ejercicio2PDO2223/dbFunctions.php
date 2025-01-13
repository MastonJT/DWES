<?php

use function PHPSTORM_META\map;

function connectToDB()
{
    try {
        $dsn = "mysql:host=localhost;charset=utf8;";
        $connection = new PDO($dsn, "root", "");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}
$connection = connectToDB();

function createInitialDB()
{
    global $connection;
    $query = "DROP DATABASE if exists agenda";
    $connection->query($query);
    $query = "create database agenda; use agenda";
    $connection->query($query);
    $query = "create table contactos(
        id int primary key auto_increment,
        nombre varchar(50) not null,
        apellidos varchar(250) not null
    )";
    $connection->query($query);
}

function insertRecord($name, $surname)
{
    global $connection;
    $query = "insert into contactos(nombre, apellidos) values(:nombre,:apellidos)";
    try {
        $ps = $connection->prepare($query);
        $ps->execute([$name, $surname]);
        return "<p>Insercion realizada con exito de " . validarSanear($nombre) . " " . validarSanear($nombre) . "</p>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
