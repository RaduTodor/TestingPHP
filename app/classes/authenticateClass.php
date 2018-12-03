<?php
namespace App\classes;

class AuthenticateClass { 
    public $username; 
    public $password;
    public $pdo;

    function __CONSTRUCT(string $username, string $password, PDO $pdo)
    {
        $this->username = $username;
        $this->password = $password;
        $this->pdo = $pdo;
    }
      
    function authenticateUser()
    {
        $sql="SELECT * FROM users WHERE username = (?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$this->username]);
        $result = $stmt->fetch();
        if($result!=null)
        {
            if(password_verify($this->password, $result["password"]))
            {
                initializeSession($result);
                return TRUE;
            }
        }
        return FALSE;
    }
    
    function initializeSession(array $result)
    {
        session_start();
        $_SESSION["username"]=$this->username;
        $_SESSION["id"] = $result["id"];
        $_SESSION["email"]=$result["email"];
        $_SESSION["birth_date"]=$result["birth_date"];
        $_SESSION["last_name"]=$result["last_name"];
        $_SESSION["first_name"]=$result["first_name"];
        $_SESSION["gender"]=$result["gender"];
    }
} 