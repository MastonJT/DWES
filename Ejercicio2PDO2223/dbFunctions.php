<?php

use function PHPSTORM_META\map;

function connectToDB()
{
    try {
        $dsn = "mysql:host=localhost;charset=utf8;";
        $connection = new PDO($dsn, "root", "");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->query("use agenda");
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
    try {
        //bindParam no hace trim automaticamente
        $name = validarSanear($name);
        $surname = validarSanear($surname);
        //verf que no estan vacios los campos
        if (empty($name) && empty($surname)) {
            return "<p style='color: red;'>Ambos campos son obligatorios.</p>";
        }
        //verificar que el registro no existe
        $query = "select * from contactos where nombre=:name and apellidos=:surname";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->execute();
        if ($stmt->rowCount() != 0) {
            return "<p style='color: red;'>El registro " . $name . " " . $surname . " ya existe.</p>";
        }
        $query = 'INSERT INTO contactos (nombre, apellidos) VALUES (:name, :surname)';
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->execute();
        return "<p>Insercion realizada con exito de " . $name . " " . $surname . "</p>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function removeRecord($ids)
{
    global $connection;
    try {
        foreach ($ids as $id) {
            $query = "delete from contactos where id=:id";
            $stmnt = $connection->prepare($query);
            $stmnt->bindParam(':id', $id);
            $stmnt->execute();
            return "<p>Supresion realizada con exito.</p>";
        }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}

function selectAllContactos()
{
    global $connection;
    try {
        $query = 'select * from contactos';
        $stmt = $connection->prepare($query);
        $stmt->execute();
        return $stmt;
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}
