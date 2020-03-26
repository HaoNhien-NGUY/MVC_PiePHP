<?php

namespace Core;

spl_autoload_register(function($className){
    $fullPath = str_replace("\\", "/", $className . ".php");
    if(!file_exists($fullPath)){
        $fullPath = "./src/" . $fullPath;
        if(!file_exists($fullPath)){
            return false;
        }
    }
    include_once $fullPath;
});