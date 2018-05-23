<?php
     /**
      * Load a setting from a configuration env.json file
      */
    function env($setting) {
        $settings = json_decode(file_get_contents(PROJECT_ROOT . "/env.json"), true);
        if(isset($settings[$setting])) {
            return $settings[$setting];
        }        
    }
    
     /**
     * File defining all constants that will be used
     * in the project
     */
    define("PROJECT_ROOT", dirname(dirname(__FILE__)) );
    define("TEMPLATE_DIR", PROJECT_ROOT . '/views');
    define("MODEL_DIR", PROJECT_ROOT . '/models');
    define("DB_HOST", 'localhost');
    define("DB_DATABASE", 'festival_baza');
    define("DB_USERNAME", env('username'));
    define("DB_PASSWORD", env('password'));