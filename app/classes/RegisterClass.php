<?php

namespace App\classes;

use PDO;
use \App\classes\AuthenticateClass;

class RegisterClass { 
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
      
    function registerUserInDb()
    {
        $sql="INSERT INTO `users` (email,password,username) VALUES(?,?,?)";
        $hashedPassword=password_hash($this->password,PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->email,$hashedPassword,$this->username]);
    }

    function callAutoLogin()
    {
        $authenticateInstance = new AuthenticateClass($this->username,$this->password,$this->pdo);
        $authenticationResult = $authenticateInstance->authenticateUser();
        $authenticateInstance->redirectAuthenticationForm($authenticationResult);
    }
}
