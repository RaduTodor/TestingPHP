<?php

require_once "db.php";

function registerUserInDb(string $username, string $password, string $email, PDO $pdo)
{
    $sql="INSERT INTO `users` (email,password,username) VALUES(?,?,?)";
    $password=password_hash($password,PASSWORD_DEFAULT);
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email,$password,$username]);
    header("Location: index.php");
}

registerUserInDb($_POST["username"],$_POST["password"],$_POST["email"], $pdo);
require_once "authenticate.php";