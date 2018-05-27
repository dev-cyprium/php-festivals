<?php
    ob_start();
    // Configuration
    require_once "../config/constants.php";
    require_once "../config/router.php";

    // Database
    require_once PROJECT_ROOT . "/config/database.php";
   
    // Models
    require_once MODEL_DIR . "/links.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Festivian</title>
    
    <?php include_once(TEMPLATE_DIR . "/includes.php"); ?>
</head>
<body>
    <?php 
        $route = resolveRoute($conn); 
        if($route['type'] == 'web') {
            include_once(TEMPLATE_DIR . "/header.php");
            include_once(TEMPLATE_DIR . "/{$route['route']}.php");
            include_once(TEMPLATE_DIR . "/footer.php");
        } else if($route['type'] == 'api') {
            ob_clean();
            require_once(API_DIR . "/{$route['route']}.php");
            exit();
        }
    ?>
</body>
</html>