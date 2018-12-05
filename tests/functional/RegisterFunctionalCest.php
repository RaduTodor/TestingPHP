<?php

use Testing\DBTools;
use Testing\TestTools;

class RegisterFunctionalCest
{
    public function testRegister(FunctionalTester $I)
    {
        $dbConn = new DBTools();
        $testTool = new TestTools();
        if ($dbConn->isEmailPresent('test@test.com'))
        {
            $dbConn->deleteAccount('test@test.com');
            //$testTool->clean('test@test.com');
        }

        $I->amOnPage('/login');
        $I->submitForm('form#register-form',
            ['username' => 'test',
             'email'    => 'test@test.com',
             'password' => 'password' ]);

        $I->seeCurrentUrlEquals('/user');
        $I->see('test');
        $I->see('test@test.com');

        $I->click('login-submit');

        $dbConn->deleteAccount('test@test.com');
        //$testTool->clean('test@test.com');
    }
}
