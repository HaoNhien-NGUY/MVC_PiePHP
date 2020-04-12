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
            if (strlen($req_params['email']) > 2 && strlen($req_params['password']) > 2 && strlen($req_params['promo_id']) != '') {
                $model = new UserModel($req_params);
                if (!$model->exists(['email' => $model->email])) {
                    $id = $model->create();
                    $_SESSION["id"] = $id;
                } else {
                    $this->render('register', ['error' => 'email already taken']);
                }
                header('Location: /MVC_PiePHP/');
            } else {
                $this->render('register', ['error' => 'wrong info']);
            }
        } else {
            $this->render('register');
            // $model = new UserModel(['id' => 22]);
            // echo "<pre>";
            // var_dump($model->articles);
            // $model->getArticles();
            // var_dump($model->getPromos());

            // var_dump($model->promos->name);
            // var_dump($model->articles[1]->getTags());
            // var_dump($model->articles[1]->tags[0]->name);
            // var_dump($model->getComments());
            // var_dump($model->comments);
            // echo "</pre>";
        }
    }

    public function loginAction()
    {
        if ($req_params = $this->request->getQueryParams()) {
            $model = new UserModel($req_params);
            if ($userinfo = $model->exists(['email' => $model->email, 'password' => [$req_params['password'], 'AND']])) {
                $_SESSION["id"] = $userinfo['id'];
            } else {
                $this->render('login', ['error' => 'Wrong email or password.']);
            }
            header('Location: /MVC_PiePHP/');
        } else {
            $this->render('login');
        }
    }

    public function deleteAction()
    {
        $model = new UserModel(['id' => 38]);
        // $model->update();
        var_dump($model->read());
    }

    public function showAction($id, $name = null)
    {
        echo __METHOD__;
        echo "<h1>User ID is : " . $id . " and User name is : " . $name . "</h1>";
    }
}
