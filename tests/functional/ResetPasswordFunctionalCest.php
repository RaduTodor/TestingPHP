<?php

use Testing\TestTools;

class ResetPasswordFunctionalCest
{
    public function resetPasswordTest(FunctionalTester $I)
    {
        // System test
        $testTools = new TestTools();
        $testTools->prepare('test@test.com', 'password', 'test');

        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'password']);

        $I->seeCurrentUrlEquals('/user');
        $I->click('edit-submit');

        $I->seeCurrentUrlEquals('/user/edit');
        $I->submitForm('form#resetPassword-form',
            [
                'password'         => 'newPassword',
                'confirm_password' => 'newPassword'
            ]);

        $I->click('input#logOut-submit');

        $I->seeCurrentUrlEquals('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'newPassword']);

        $I->seeCurrentUrlEquals('/user');
        $I->click('login-submit');

        $I->seeCurrentUrlEquals('/login');

        $testTools->clean('test@test.com');
    }
}
