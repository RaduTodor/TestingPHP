<?php

require_once "db.php";

function registerUserInDb(string $username, string $password, string $email, PDO $pdo)
{
    $sql="INSERT INTO `users` (email,password,username) VALUES(?,?,?)";
    $password=password_hash($password,PASSWORD_DEFAULT);
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email,$password,$username]);
    echo('You were registered successfully '.$username);
}

registerUserInDb($_POST["username"],$_POST["password"],$_POST["email"], $pdo);