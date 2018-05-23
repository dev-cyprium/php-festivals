<?php   
    function fetchAll(PDO $conn, string $table) {
        return $conn->query("SELECT * FROM $table");
    }