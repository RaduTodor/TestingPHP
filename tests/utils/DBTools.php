<?php

namespace Testing;

use App\classes\DatabaseConnection;


class DBTools
{
    public function isEmailPresent(string $email)
    {
        $dbConn = new DatabaseConnection();
        $pdo = $dbConn->CreateDatabaseConnection();

        $sql = 'SELECT * FROM users WHERE email = (?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();

        if ($result == null)
        {
            return false;
        }
        return count($result) != 0;
    }

    public function deleteAccount(string $email)
    {
        $dbConn = new DatabaseConnection();
        $pdo = $dbConn->CreateDatabaseConnection();

        $sql = 'DELETE FROM users WHERE email = (?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function addAccount(string $email, string $password, $username)
    {
        $dbConn = new DatabaseConnection();
        $pdo = $dbConn->CreateDatabaseConnection();

        $sql="INSERT INTO `users` (email,password,username) VALUES(?,?,?)";
        $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email,$hashedPassword,$username]);
        return $stmt->fetch();
    }

    public function addFullAccount(string $email, string $password, $username,
                                   string $firstName, string $lastName, string $birthDate, string $gender)
    {
        $dbConn = new DatabaseConnection();
        $pdo = $dbConn->CreateDatabaseConnection();

        $sql="INSERT INTO `users` (email,password,username,first_name,last_name,birth_date,gender) VALUES(?,?,?,?,?,?,?)";
        $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email,$hashedPassword,$username,$firstName,$lastName,$birthDate,$gender]);
        return $stmt->fetch();
    }
}