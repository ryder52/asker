<?php

namespace App\Controller;

use App\Service\UserService;

class UserController extends BaseController
{

    public function login()
    {
        $this->setJs('userLogin');
        $this->render('user/login');
    }

    public function ajaxLogin()
    {
        $this->setLayout('');
        $formValues = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (!isset($formValues['username'], $formValues['password'])) {
            $this->set(['content' => 'INVALID']);
            $this->render('data/json');
            return;
        }
        $userService = new UserService();
        $logged = $userService->login($formValues['username'], $formValues['password']);
        if ($logged) {
            $this->set(['content' => 'OK']);
        } else {
            $this->set(['content' => 'INVALID']);
        }
        $this->render('data/json');
    }

    public function register()
    {
        $this->setJs('userRegister');
        $this->render('user/register');
    }

    public function ajaxRegister()
    {
        $this->setLayout('');
        $formValues = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (!isset($formValues['username'], $formValues['password'])) {
            $this->set(['content' => 'INVALID']);
            $this->render('data/json');
            return;
        }
        $userService = new UserService();
        $registered = $userService->register($formValues['username'], $formValues['password']);
        if ($registered) {
            $this->set(['content' => 'OK']);
        } else {
            $this->set(['content' => 'INVALID']);
        }
        $this->render('data/json');
    }

    public function logout()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
        $this->redirect('home');
    }
}
