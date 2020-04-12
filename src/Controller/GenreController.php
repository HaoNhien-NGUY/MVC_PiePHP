<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class GenreController extends Controller
{
    public function indexAction()
    {
        if(isset($_SESSION['id'])) {
            $user = new UserModel(['id' => $_SESSION['id']]);
            $email = $user->email;
            $this->render('index', ['email' => $email]);
        } else { 
            $this->render('index');
        }
    }
}