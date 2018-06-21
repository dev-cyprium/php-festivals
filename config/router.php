<?php
    require_once MODEL_DIR . "/links.php";
    
    /**
     * Resolves the route using the database
     */
    function resolveRoute(PDO $conn) {
        $links = fetchLinks($conn);
        $uri   = $_SERVER['REQUEST_URI'];
        $route = substr($uri, strpos($uri, '/')+1);
        $patt  = '/^api.*$/';
        if(preg_match($patt, $route)) {
            return [
                "route" => forApi($route),
                "type"  => "api"
            ];
        }
        foreach($links as $link) {
            if($link->name == strtolower($route)) {
                return [
                    "route" => $link->name,
                    "type"  => "web"
                ];
            }
        }
        return [
            "route" => "pocetna",
            "type"  => "web"
        ];
    }

    /**
     * Parser the API route
     */
    function forApi($unparsed) {
        $matches = [];
        $reg = '/^api(\/[^?]*)/';
        preg_match_all($reg, $unparsed, $matches);
        $str = $matches[1][0];
        return substr($str, 1);
    }