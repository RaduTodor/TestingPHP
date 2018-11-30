<?php

require_once "db.php";


function resetPassword(string $password, string $confirm_password, PDO $pdo)
{
    if($password === $confirm_password)
    {
        $sql="UPDATE `users` SET `password` = (?) WHERE `id` = (?)";
        $stmt = $pdo->prepare($sql);
        session_start();
        $password=password_hash($password,PASSWORD_DEFAULT);
        $status = $stmt->execute([$password,$_SESSION["id"]]);
        if ($status === false) {
            trigger_error($stmt->error, E_USER_ERROR);
        }
    } 
}

resetPassword($_POST["password"],$_POST["confirm_password"], $pdo);
header("Location: edit.php");