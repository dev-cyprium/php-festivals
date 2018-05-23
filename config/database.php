<?php
    require_once "constants.php";

    $dsn = "mysql:dbname=${DB_DATABASE};host=${DB_HOST}";
    try {
        $conn = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }