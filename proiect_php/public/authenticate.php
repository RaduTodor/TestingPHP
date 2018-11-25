<?php

require_once "db.php";


function authenticateUser(string $username, string $password, PDO $pdo)
{
    $sql="SELECT * FROM users WHERE username = (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $result = $stmt->fetch();
    if($result!=null)
    {
        if(password_verify($password, $result["password"]))
        {
            session_start();
            $_SESSION["username"]=$username;
            $_SESSION["email"]=$result["email"];
            echo('Hello there '.$username);
        }
        else
        {
            echo('Begone');
        }
    }    
}

authenticateUser($_POST["username"],$_POST["password"], $pdo);