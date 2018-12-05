<?php

namespace App\classes;

use PDO;
use \App\classes\AuthenticateClass;

class RegisterClass
{
    private $username;
    private $password;
    private $email;
    private $pdo;

    function __CONSTRUCT(string $username, string $password, string $email, PDO $pdo)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->pdo = $pdo;
    }

    function checkEmailExists()
    {
        $sql = "SELECT * FROM users WHERE email = (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->email]);
        $result = $stmt->fetch();
        if ($result) {
            return FALSE;
        }
        return TRUE;
    }

    function registerUserInDb()
    {
        if ($this->checkEmailExists()) {
            $sql = "INSERT INTO `users` (email,password,username) VALUES(?,?,?)";
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$this->email, $hashedPassword, $this->username]);
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function callAutoLogin()
    {
        $authenticateInstance = new AuthenticateClass($this->email, $this->password, $this->pdo);
        $authenticationResult = $authenticateInstance->authenticateUser();
        $authenticateInstance->redirectAuthenticationForm($authenticationResult);
    }
}
