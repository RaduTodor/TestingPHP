<?php

namespace App\classes;

use PDO;

class ResetPassword { 
    private $pdo;

    function __CONSTRUCT(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    function resetPassword(string $password, string $confirm_password)
    {
        if($password === $confirm_password)
        {
            $sql="UPDATE `users` SET `password` = (?) WHERE `id` = (?)";
            $stmt = $this->pdo->prepare($sql);
            $password=password_hash($password,PASSWORD_DEFAULT);
            $status = $stmt->execute([$password,$_SESSION["id"]]);
            if ($status === false) {
                trigger_error($stmt->error, E_USER_ERROR);
            }

        }
        $message = "wrong answer";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
