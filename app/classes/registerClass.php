<?php
namespace App\classes;

class RegisterClass { 
    public $username; 
    public $password;
    public $email;
    public $pdo;

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
        $password=password_hash($password,PASSWORD_DEFAULT);
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email,$password,$username]);
    }
}