<?php

use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/utilisateur/ajouter', ['controller' => 'user', 'action' => 'add']);
Router::connect('/user/{id}', ['controller' => 'app', 'action' => 'index']);

// /user/68  => /user/{id}
//how ?

//preg replace what is in {} ?