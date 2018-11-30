<?php

require_once "db.php";


function editProfile(string $username, string $email, string $birth_date, string $first_name, string $last_name, string $gender, PDO $pdo)
{
    
    session_start();
    $sql="UPDATE `users` SET `username` = (?), `email` = (?), `birth_date` = (?),`first_name` = (?),`last_name` = (?),`gender` = (?) WHERE `id` = (?)";
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute([$username,$email,$birth_date,$first_name,$last_name,$gender,$_SESSION["id"]]);
    if ($status === false) {
        trigger_error($stmt->error, E_USER_ERROR);
    }
    else
    {
        $_SESSION["username"]=$username;
        $_SESSION["email"]=$email;
        $_SESSION["birth_date"]=$birth_date;
        $_SESSION["last_name"]=$last_name;
        $_SESSION["first_name"]=$first_name;
        $_SESSION["gender"]=$gender;
    }
    
}


editProfile($_POST["username"],$_POST["email"],$_POST["birth_date"],$_POST["first_name"],$_POST["last_name"],$_POST["gender"], $pdo);
header("Location: edit.php");