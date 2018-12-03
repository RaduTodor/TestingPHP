<?php

namespace App\controllers;
use \App\classes\AuthenticateClass;
use \App\classes\LogOutClass;
use \App\classes\RegisterClass;

require_once "db.php";

class LoginController
{
    public function loginPageAction(array $params, array $query) {
        echo file_get_contents(__DIR__."\..\htmls\loginPage.php");
        // /login
    }

    public function loginAuthAction(array $params, array $query) {
        $authenticateInstance = new AuthenticateClass($params["username"],$params["password"],$pdo);
        $authenticateSucceeded = $authenticateInstance->authenticateUser();
        if($authenticateSucceeded)
        {
            header("Location: /");
        }
        else
        {
            header("Location: /login");
        }
        // /login/auth
    }

    public function logoutAction(array $params, array $query) {
        $logOutInstance = new logOutClass();
        $logOutInstance->logout();
        // /logout
    }

    public function registerAction(array $params, array $query) {
        $registerInstance = new RegisterClass($params["username"],$params["password"],$params["email"],$pdo);
        $registerInstance->registerUserInDb();
        header("Location: /login/auth");
        // /register
    }
}