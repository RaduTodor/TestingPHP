<?php

namespace Testing;


class TestTools
{
    public function prepare(string $email, string $password, string $username)
    {
        $dbTools = new DBTools();
        $dbTools->deleteAccount($email);
        $dbTools->addAccount($email, $password, $username);
    }

    public function clean(string $email)
    {
        $dbTools = new DBTools();
        $dbTools->deleteAccount($email);
    }

    public function prepareFull(string $email, string $password, string $username,
                    string $firstName, string $lastName, string $birthDate, string $gender)
    {
        $dbTools = new DBTools();
        $dbTools->deleteAccount($email);
        $dbTools->addFullAccount($email, $password, $username,
            $firstName, $lastName, $birthDate, $gender);
    }
}