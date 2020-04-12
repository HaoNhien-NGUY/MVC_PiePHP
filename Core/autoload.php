<?php

namespace Core;

spl_autoload_register(function($className){
    $fullPath = str_replace("\\", DIRECTORY_SEPARATOR, $className . ".php");
    if(!file_exists($fullPath)){
        $fullPath = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', $fullPath]);
        if(!file_exists($fullPath)){
            return false;
        }
    }
    include_once $fullPath;
});