<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class AppController extends Controller
{
    public function indexAction()
    {
        if (isset($this->request->getQueryParams()['logout'])) {
            session_destroy();
            unset($_SESSION['id']);
        }
        if(isset($_SESSION['id'])) {
            $user = new UserModel(['id' => $_SESSION['id']]);
            $email = $user->email;
            $this->render('index', ['email' => $email]);
        } else { 
            $this->render('index');
        }
    }

    public function errorAction()
    {
        if(isset($_SESSION['id'])) {
            $user = new UserModel(['id' => $_SESSION['id']]);
            $email = $user->email;
            $this->render('error', ['email' => $email]);
        } else { 
            $this->render('error');
        }
    }
}
