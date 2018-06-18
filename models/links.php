<?php        
    function fetchLinks(PDO $conn) {
        return fetchAll($conn, "linkovi");
    }