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

        
        if ($req_params = $this->request->getQueryParams()) {
            $model = new UserModel($req_params);
            // $model->create();
        } else {
            $this->render('register');
            $model = new UserModel(['id' => 22]);
            echo "<pre>";
            // var_dump($model->articles);
            $model->getArticles();
            // var_dump($model->getPromos());
            
            // var_dump($model->promos->name);
            var_dump($model->articles[1]->getTags());
            var_dump($model->articles[1]->tags[0]->name);
            var_dump($model->getComments());
            // var_dump($model->comments);
            echo "</pre>";
            $model->allo();
        }
    }

    public function showAction($id, $name = null)
    {
        echo __METHOD__;
        echo "<h1>User ID is : " . $id . " and User name is : " . $name . "</h1>";
    }
}
