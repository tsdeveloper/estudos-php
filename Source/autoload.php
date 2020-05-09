<?php

spl_autoload_register(function ($class) {
    $pastaRoot = "Source\\";
    $baseDir = __DIR__ . "/";
    $len = strlen($pastaRoot);

    var_dump($class);
    
    if (strncmp($pastaRoot, $class, $len) !== 0) {
        return;
    }

    $retaliveClass = substr($class, $len);
    $file = $baseDir . str_replace("\\", "/", $retaliveClass) . ".php"; 

    if (file_exists($file)){
        require $file;
    }

});