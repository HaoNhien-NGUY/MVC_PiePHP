<?php

namespace Core;

class Controller
{
    protected static $_render;
    protected $request;

    function __construct()
    {
        $this->request = new Request();
    }

    protected function render($view, $scope = [])
    {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace(['Controller', "\\"], '', basename(get_class($this))), $view]) . '.php';
        if (file_exists($f)) {
            ob_start();      
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            $tmp = ob_get_clean();
            TemplateEngine::parse($tmp);
            ob_start();
            include('./tmp.php');
            self::$_render = ob_get_clean();
        }
        else{
            echo "<h1>File $f doesn't exist</h1>";
        }
    }

    public function __destruct()
    {
        echo self::$_render;
    }
}