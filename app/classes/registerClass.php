<?php
namespace App\classes;
use PDO;

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
        $this->password=password_hash($this->password,PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->email,$this->password,$this->username]);
    }

    function callAutoLogin()
    {
        $data = array(
            'username' => $this->username,
            'password' => $this->password
        );
        $url = '/login/auth';
        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($data, '', '&');
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);
    }
}