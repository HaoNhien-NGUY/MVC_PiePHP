<?php

namespace Controller;

use Core\Controller;
use Model\FilmModel;
use Model\UserModel;

class FilmController extends Controller
{
    public function indexAction()
    {
        $scope = [];

        if (isset($_SESSION['id'])) {
            $user = new UserModel(['id' => $_SESSION['id']]);
            $email = $user->email;
            $scope['email'] = $email;
        }

        $model = new FilmModel();
        // $fetch = $model->read_all();


        $scope['films'] = $model->read_all();

        $this->render('index', $scope);
    }

    public function showAction($id)
    {
        $scope = [];

        if (isset($_SESSION['id'])) {
            $user = new UserModel(['id' => $_SESSION['id']]);
            $email = $user->email;
            $scope['email'] = $email;
        }

        if((string)(int)$id == $id) {
            $film =  new FilmModel(['id' => $id]);
            if($film->exists(['id' => $id])) {
                $film->getGenres();
                $scope['film'] = $film;
                $scope['genre'] = $film->genres->name;
            }
        }

        $this->render('show', $scope);
    }

    public function deleteAction($id)
    {
        $scope = [];

        if (isset($_SESSION['id'])) {
            $user = new UserModel(['id' => $_SESSION['id']]);
            $email = $user->email;
            $scope['email'] = $email;
        }

        if((string)(int)$id == $id) {
            $film =  new FilmModel(['id' => $id]);
            if($film->exists(['id' => $id])) {
                $film->delete();
                header('Location: /MVC_PiePHP/film');
            }
        } else {
            $this->render('show', $scope);
        }

    }
}
