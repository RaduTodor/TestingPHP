<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 04-Dec-18
 * Time: 11:37 PM
 */

class LoginFunctionalCest
{

    public function testLogin1(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['username' => 'codeception', 'password' => 'password']);
        $I->see('codeception');
        $I->see('a@a.com');
        $I->see('0000-00-00');
    }

    public function testLogin2(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['username' => 'codeception2', 'password' => 'password']);
        $I->see('codeception2');
        $I->see('a@a.com');
        $I->see('2018-12-14');
        $I->see('first_name');
        $I->see('last_name');
        $I->see('male');
    }
}
