<?php
/**
 * Created by PhpStorm.
 * User: todor
 * Date: 12/5/2018
 * Time: 1:15 AM
 */

use App\classes\RegisterClass;
use App\classes\DatabaseConnection;

class RegisterClassTest extends \Codeception\Test\Unit
{
    public function testRegisterUserInDbSameEmail()
    {
        $databaseInstance = new DatabaseConnection();
        $registerInstance = new RegisterClass("username", "password", "email@email.com", $databaseInstance->CreateDatabaseConnection());
        $this->assertTrue(($registerInstance->registerUserInDb()) == FALSE);
    }

    public function testRegisterUserInDbEmptyPassword()
    {
        $databaseInstance = new DatabaseConnection();
        $registerInstance = new RegisterClass("username", "", "emailx@email.com", $databaseInstance->CreateDatabaseConnection());
        $this->assertTrue(($registerInstance->registerUserInDb()) == TRUE);
    }
}
