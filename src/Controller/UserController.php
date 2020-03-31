<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{
    public function addAction(){
        echo __METHOD__;
    }

    public function indexAction(){
        echo __METHOD__;
        $this->render('index');
    }

    public function registerAction(){
        $model = new UserModel();

        $this->render('register');

        var_dump($this->request->params);

        if((isset($_POST['email']) && $_POST['email'] != '') && (isset($_POST['password']) && $_POST['password'] != '')){
            $model->setEmail($_POST['email']);
            $model->setPassword($_POST['password']);
            $model->save();
        }
    }
    
}
