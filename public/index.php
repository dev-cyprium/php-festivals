<?php
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
    <?php $active_name = resolveRoute($conn); ?>
    <?php include_once(TEMPLATE_DIR . "/header.php"); ?>
    <?php include_once(TEMPLATE_DIR . "/$active_name.php"); ?>
    <?php include_once(TEMPLATE_DIR . "/footer.php"); ?>
</body>
</html>