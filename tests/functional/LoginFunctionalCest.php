<?php

use Testing\TestTools;

class LoginFunctionalCest
{

    public function testLogin1(FunctionalTester $I)
    {
        // Integration test
        $testTool = new TestTools();
        $testTool->prepare('test@test.com', 'password', 'test');

        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'password']);
        $I->see('test');
        $I->see('test@test.com');
        $I->see('0000-00-00');

        $testTool->clean('test@test.com');
    }


    public function testLogin2(FunctionalTester $I)
    {
        // Integration test
        $testTool = new TestTools();
        $testTool->prepareFull('test@test.com', 'password', 'test',
            'first_name', 'last_name', '2018-12-14', 'male');

        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'password']);
        $I->see('test');
        $I->see('test@test.com');
        $I->see('2018-12-14');
        $I->see('first_name');
        $I->see('last_name');
        $I->see('male');

        $testTool->clean('test@test.com');
    }
}
