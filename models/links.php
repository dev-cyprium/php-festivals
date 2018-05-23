<?php
    require_once "helpers/func.php";

    function fetchLinks(PDO $conn) {
        return fetchAll($conn, "linkovi");
    }