<?php
    require_once MODEL_DIR . "/links.php";
    
    /**
     * Resolves the route using the database
     */
    function resolveRoute(PDO $conn) {
        $links = fetchLinks($conn);
        $uri   = $_SERVER['REQUEST_URI'];
        $route = substr($uri, strpos($uri, '/')+1);
        foreach($links as $link) {
            if($link->name == strtolower($route)) {
                return $link->name;
            }
        }
        return "pocetna";
    }