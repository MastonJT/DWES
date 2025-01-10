<?php

use function PHPSTORM_META\map;

function createDB($name, $connection)
{
    $query = "DROP DATABASE if exists $name";
    return $connection->query($query);
}

function insertRecord($dataArr, $table, $connection)
{
    $query = "insert into ? values(?)";
    try {
        $ps = $connection->prepare($query);
        $ps->execute($table, $dataArr);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
