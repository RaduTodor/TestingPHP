<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 04-Dec-18
 * Time: 11:37 PM
 */

use App\controllers\LoginController;

class LoginControllerCest
{

    public function testLoginPageAction(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['username' => 'codeception', 'password' => 'password']);
        $I->see('codeception');
        $I->see('a@a.com');
        $I->see('0000-00-00');
    }

    public function testRegisterAction(FunctionalTester $I)
    {

    }

    public function testLogoutAction(FunctionalTester $I)
    {

    }
}
