<?php

namespace Controller;

use Core\Controller;

class AppController extends Controller
{
    public function indexAction(){
        echo __METHOD__ ."<br>";
    }
}
