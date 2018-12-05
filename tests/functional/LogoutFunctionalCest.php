<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 04-Dec-18
 * Time: 11:10 PM
 */

use App\classes\LogoutClass;

class LogoutFunctionalCest
{

    public function testLogout1(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['username' => 'codeception', 'password' => 'password']);
        $I->click('login-submit');
        $I->seeCurrentUrlEquals('/login');
        $I->seeElement('input#authUsername');
        $I->seeElement('input#authPassword');
    }

    public function testLogout2(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['username' => 'codeception', 'password' => 'password']);
        $I->seeCurrentUrlEquals('/user');

        $I->click('edit-submit');
        $I->seeCurrentUrlEquals('/user/edit');

        $I->click('logOut-submit');
        $I->seeCurrentUrlEquals('/login');
        $I->seeElement('input#authUsername');
        $I->seeElement('input#authPassword');
    }
}
