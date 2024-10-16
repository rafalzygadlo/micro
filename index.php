<?php

    ini_set("display_errors","on");
    error_reporting(E_ALL);
   
    // autoloader
    spl_autoload_extensions(".php");
    spl_autoload_register(function ($class)
    {
        $file = str_replace("\\", "/", $class) . ".php";
        require_once($file);
    });
   
    
    include "system.config.php";

    Lib\Msg::init();
    function __($msg){ return Lib\Msg::get($msg);  }

    $app = new Lib\App();
    $app->run();
    
    

?>
