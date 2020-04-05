<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{
    public function addAction()
    {
        echo __METHOD__;
    }

    public function indexAction()
    {
        echo __METHOD__;
        $model = new UserModel();
        $model->read_all();
        $this->render('index', ['users' => $model->read_all()]);
    }

    public function registerAction()
    {

        $this->render('register');

        if ($req_params = $this->request->getQueryParams()) {
            $model = new UserModel($req_params);
            // $model->create();
        }else{
            $model = new UserModel(['id' => 22]);
            echo "<pre>";
            var_dump($model->articles);
            echo "</pre>";
        }
    }
}
