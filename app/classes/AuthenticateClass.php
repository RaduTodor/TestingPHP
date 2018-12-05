<?php

namespace App\classes;

use PDO;

class AuthenticateClass { 
    private $email;
    private $password;
    private $pdo;

    function __CONSTRUCT(string $email, string $password, PDO $pdo)
    {
        $this->email = $email;
        $this->password = $password;
        $this->pdo = $pdo;
    }

    function initializeSession(array $result)
    {
        session_start();
        $_SESSION["username"]=$result["username"];
        $_SESSION["id"] = $result["id"];
        $_SESSION["email"]=$this->email;
        $_SESSION["birth_date"]=$result["birth_date"];
        $_SESSION["last_name"]=$result["last_name"];
        $_SESSION["first_name"]=$result["first_name"];
        $_SESSION["gender"]=$result["gender"];
    }

    function authenticateUser()
    {
        $sql="SELECT * FROM users WHERE email = (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->email]);
        $result = $stmt->fetch();
        if($result)
        {
            if(password_verify($this->password, $result["password"]))
            {
                $this->initializeSession($result);
                return TRUE;
            }
        }
        return FALSE;
    }

    function redirectAuthenticationForm(bool $authenticateResult)
    {
        if($authenticateResult)
        {
            header("Location: /");
        }
        else
        {
            $_SESSION["wrong_password_alert_message"] = "The email or password is wrong!";
            header("Location: /login");
        }
    }
}
