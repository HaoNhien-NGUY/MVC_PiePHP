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
        $this->render('index');
    }

    public function registerAction()
    {

        $this->render('register');

        if ($req_params = $this->request->getQueryParams()) {
            $model = new UserModel($req_params);
            $model->create();
        }else{
            $model = new UserModel();
            // echo "<pre>";
            // $tabs = ($model->read_all());
            // // var_dump($tabs);
            // foreach($tabs as $k => $v){
            //     // var_dump($v['id']);
            //     $testab[] = $v['id'];
            // }
            // var_dump($testab);
            // echo "</pre>";
        }
    }
}
