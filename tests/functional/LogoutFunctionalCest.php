<?php

use Testing\TestTools;

class LogoutFunctionalCest
{

    public function testLogout1(FunctionalTester $I)
    {
        // System test
        $testTools = new TestTools();
        $testTools->prepare('test@test.com', 'password', 'test');

        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'password']);
        $I->click('login-submit');
        $I->seeCurrentUrlEquals('/login');
        $I->seeElement('input#authEmail');
        $I->seeElement('input#authPassword');

        $testTools->clean('test@test.com');
    }


    public function testLogout2(FunctionalTester $I)
    {
        // System test
        $testTools = new TestTools();
        $testTools->prepare('test@test.com', 'password', 'test');

        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'password']);
        $I->seeCurrentUrlEquals('/user');

        $I->click('edit-submit');
        $I->seeCurrentUrlEquals('/user/edit');

        $I->click('logOut-submit');
        $I->seeCurrentUrlEquals('/login');
        $I->seeElement('input#authEmail');
        $I->seeElement('input#authPassword');

        $testTools->clean('test@test.com');
    }
}
