<?php
    $estadios=array(
        "Barcelona"=>"Camp Nou",
        "Real Madrid"=>"Santiago Bernabeu",
        "Valencia"=>"Mestalla",
        "Real Sociedad"=>"Anoeta",
    );
    print "<ol>";
    foreach ($estadios as $equipo => $estadio) {
        print "<li>El Equipo: $equipo tiene el estadio: $estadio</li>";
    }
    unset($estadios["Real Madrid"]);
    print "</ol><ol>";
    foreach ($estadios as $equipo => $estadio) {
        print "<li>El Equipo: $equipo tiene el estadio: $estadio</li>";
    }
    print "</ol>";
?>