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
            $_SESSION["id"] = $result["id"];
            $_SESSION["email"]=$result["email"];
            $_SESSION["birth_date"]=$result["birth_date"];
            $_SESSION["last_name"]=$result["last_name"];
            $_SESSION["first_name"]=$result["first_name"];
            $_SESSION["gender"]=$result["gender"];
            return TRUE;
        }
    }
    return FALSE;
}

$authenticateSucceeded = authenticateUser($_POST["username"],$_POST["password"], $pdo);
if($authenticateSucceeded)
{
    header("Location: edit.php");
}
else
{
    header("Location: index.php");
}