<?php

try {
    // connecting to your DataBase
    $conn = new mysqli(
        "localhost", // hostname
        "root",
        "", // password
        "crud", // database name
        3306 // number of port
    );
} catch (Exception $e) {
    die("can't make Connection" . $e->getMessage());
}
