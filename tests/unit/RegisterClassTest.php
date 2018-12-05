<?php

use App\classes\RegisterClass;
use App\classes\DatabaseConnection;
use Testing\TestTools;

class RegisterClassTest extends \Codeception\Test\Unit
{
    public function testRegisterUserInDbSameEmail()
    {
        $testTools = new TestTools();
        $testTools->prepare("email@email.com", "password", "username");

        $databaseInstance = new DatabaseConnection();
        $registerInstance = new RegisterClass("username", "password", "email@email.com", $databaseInstance->CreateDatabaseConnection());
        $this->assertTrue(($registerInstance->checkEmailExists()));

        $testTools->clean('email@email.com');
    }

    public function testRegisterUserInDbEmptyPassword()
    {
        $testTools = new TestTools();
        $testTools->clean('emailxz@email.com');

        $databaseInstance = new DatabaseConnection();
        $registerInstance = new RegisterClass("username", "", "emailxz@email.com", $databaseInstance->CreateDatabaseConnection());
        $this->assertTrue(($registerInstance->registerUserInDb()));

        $testTools->clean('emailxz@email.com');
    }
}
