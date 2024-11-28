<?php

conectarBDD();

function conectarBDD()
{
    try {
        $conection = new PDO("mysql:host=localhost:3306;charset=utf8", "root", "root");
        $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print "patata";
        return $conection;
    } catch (PDOException $e) {
        print '<p>Se ha producido un error por \n' . $e->getMessage() . '</p>';
    }
}


docker run -d --name my-mysql -e MYSQL_ROOT_PASSWORD=root -p 3306:3306 -v my-mysql-data:/home/alumnotd/DWES mysql
