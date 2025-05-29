<?php
    $host = "localhost";
    $user = "root";
    $pass = "umng.2025";
    $name = "portal";

    $hostPDO = "mysql:host=$host;dbname=$name;";
    $myPDO = new PDO($hostPDO, $user, $pass);
?>