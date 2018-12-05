<?php

use Testing\TestTools;

class EditProfileFunctionalCest
{
    public function editProfileTest(FunctionalTester $I)
    {
        $testTool = new TestTools();
        $testTool->prepareFull('test@test.com', 'password', 'test',
            'first_name', 'last_name', '2018-04-12', 'male');

        $I->amOnPage('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'password']);
        $I->see('test');
        $I->see('test@test.com');
        $I->see('2018-04-12');
        $I->see('first_name');
        $I->see('last_name');
        $I->see('male');
        $I->click('edit-submit');

        $I->submitForm('form#edit-form',
            [   'username' => 'my_username',
                'email' => 'newEmail@yahoo.com',
                'birth_date' => '2001-02-28',
                'first_name' => 'Ion',
                'last_name' => 'Ionescu',
                'gender' => 'other'  ]);

        $I->amOnPage('/user');
        $I->see('my_username');
        $I->see('newEmail@yahoo.com');
        $I->see('2001-02-28');
        $I->see('Ion');
        $I->see('Ionescu');
        $I->see('other');

        $I->click('login-submit');

        $testTool->clean('newEmail@yahoo.com');
    }
}
