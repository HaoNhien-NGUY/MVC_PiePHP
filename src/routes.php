<?php

use Core\Router;

Router::connect('/MVC_PiePHP/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/MVC_PiePHP/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/MVC_PiePHP/utilisateur/ajouter', ['controller' => 'user', 'action' => 'add']);