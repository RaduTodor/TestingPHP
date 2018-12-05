<?php

use Testing\TestTools;

class RoutingFunctionalCest
{
    public function routingTest(FunctionalTester $I)
    {
        // Integration test
        $testTool = new TestTools();
        $testTool->prepare('test@test.com', 'password', 'test');

        $I->amOnPage('/');
        $I->seeCurrentUrlEquals('/login');

        $I->amOnPage('/garbage');
        $I->seeCurrentUrlEquals('/login');

        $I->amOnPage('/moregarbage');
        $I->seeCurrentUrlEquals('/login');
        $I->submitForm('form#login-form', ['email' => 'test@test.com', 'password' => 'password']);

        $I->seeCurrentUrlEquals('/user');

        $I->amOnPage('/garbage22');
        $I->seeCurrentUrlEquals('/user');

        $I->amOnPage('/user/edit');
        $I->seeCurrentUrlEquals('/user/edit');

        $testTool->clean('test@test.com');
    }

}
