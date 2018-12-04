<?php

namespace App\controllers;

use \App\classes\AuthenticateClass;
use \App\classes\LogoutClass;
use \App\classes\RegisterClass;
use \App\classes\DatabaseConnection;

class LoginController
{
    private $pdo;

    function __CONSTRUCT()
    {
        $databaseConnectionInstance = new DatabaseConnection(); 
        $this->pdo = $databaseConnectionInstance->CreateDatabaseConnection();
    }
    public function loginPageAction(array $params, array $query) {
        include(__DIR__ . "\..\htmls\loginpage.phtml");
        // /login
    }

    public function loginAuthAction(array $params, array $query) {
        $authenticateInstance = new AuthenticateClass($params["username"],$params["password"],$this->pdo);
        $authentificationResult = $authenticateInstance->authenticateUser();
        $authenticateInstance->redirectAuthenticationForm($authentificationResult);
        // /login/auth
    }

    public function logoutAction(array $params, array $query) {
        $logOutInstance = new LogoutClass();
        $logOutInstance->logout();
        // /logout
    }

    public function registerAction(array $params, array $query) {
        $registerInstance = new RegisterClass($params["username"],$params["password"],$params["email"],$this->pdo);
        $registerInstance->registerUserInDb();
        $registerInstance->callAutoLogin();
        // /register
    }
}
