<?php

use Core\Router;

Router::connect('/user/profile/{id}/{name?}', ['controller' => 'user', 'action' => 'show']);
Router::connect('/film/remove/{id}', ['controller' => 'film', 'action' => 'delete']);
Router::connect('/film/{id}', ['controller' => 'film', 'action' => 'show']);
Router::connect('/', ['controller' => 'app', 'action' => 'index']);
// Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
// Router::connect('/utilisateur/ajouter', ['controller' => 'user', 'action' => 'add']);