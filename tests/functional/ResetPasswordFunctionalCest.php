<?php

use Testing\TestTools;

class ResetPasswordFunctionalCest
{
    public function resetPasswordTest(FunctionalTester $I)
    {
        $testTools = new TestTools();
        $testTools->prepare('test@test.com', 'password', 'test');

        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'password']);

        $I->seeInCurrentUrl('/user');
        $I->click('edit-submit');

        $I->seeInCurrentUrl('/user/edit');
        $I->submitForm('form#resetPassword-form',
            [
                'password'         => 'newPassword',
                'confirm_password' => 'newPassword'
            ]);

        $I->click('input#logOut-submit');

        $I->seeInCurrentUrl('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'newPassword']);

        $I->seeInCurrentUrl('/user');
        $I->click('login-submit');

        $I->seeInCurrentUrl('/login');

        $testTools->clean('test@test.com');
    }
}
