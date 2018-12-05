<?php

use Testing\TestTools;

class RegisterFunctionalCest
{
    public function testRegister(FunctionalTester $I)
    {
        // Functional test
        $testTool = new TestTools();
        $testTool->clean('test@test.com');


        $I->amOnPage('/login');
        $I->submitForm('form#register-form',
            ['username' => 'test',
             'email'    => 'test@test.com',
             'password' => 'password' ]);

        $I->seeCurrentUrlEquals('/user');
        $I->see('test');
        $I->see('test@test.com');

        $I->click('login-submit');

        $testTool->clean('test@test.com');
    }
}
