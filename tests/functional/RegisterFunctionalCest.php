<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 05-Dec-18
 * Time: 1:28 AM
 */

use App\classes\DatabaseConnection;

class RegisterFunctionalCest
{
    public function testRegister(FunctionalTester $I)
    {
        $randomInt = rand();

        $I->amOnPage('/login');
        $I->submitForm('form#register-form',
            [   'username' => 'codeception'.$randomInt,
                'password' => 'password',
                'email'    => 'a@a'.$randomInt.'com']);

        $I->seeCurrentUrlEquals('/user');
        $I->see('codeception'.$randomInt);
        $I->see('a@a'.$randomInt.'com');

        $I->click('login-submit');

        $this->clearDB('a@a'.$randomInt.'com');
    }

    private function clearDB($email)
    {
        $dbConn = new DatabaseConnection();
        $pdo = $dbConn->CreateDatabaseConnection();

        $sql="DELETE FROM users WHERE email = (?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $stmt->fetch();
    }
}
