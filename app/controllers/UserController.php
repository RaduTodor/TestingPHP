<?php

namespace App\controllers;
use \App\classes\EditClass;
use \App\classes\ResetPassword;
use \App\classes\DatabaseConnection;

class UserController
{
    private $pdo;

    function __CONSTRUCT()
    {
        $databaseConnectionInstance = new DatabaseConnection(); 
        $this->pdo = $databaseConnectionInstance->CreateDatabaseConnection();
    }

    public function userPageAction(array $params, array $query) {
         include(__DIR__."\..\htmls\userPage.php");
        // /user
    }

    public function userEditAction(array $params, array $query) {
         include(__DIR__."\..\htmls\userEditPage.php");
        // /user/edit
    }

    public function userSaveAction(array $params, array $query) {
        $editInstance = new EditClass($this->pdo);
        $editInstance->editProfile($params["username"],$params["email"],$params["birth_date"],$params["first_name"],$params["last_name"],$params["gender"]);
        header("Location: /user/edit");
        // /user/save
    }

    public function resetPasswordAction(array $params, array $query) {
        $resetPasswordInstance = new ResetPassword($this->pdo);
        $resetPasswordInstance->resetPassword($params["password"],$params["confirm_password"]);
        header("Location: /user/edit");
        // /user/resetpassword
    }
}