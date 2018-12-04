<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 04-Dec-18
 * Time: 10:10 PM
 */

use App\classes\LogOutClass;

class LogOutClassTest extends \Codeception\Test\Unit
{

    public function testLogout()
    {
//        header("/logout");
//        $_SERVER['REQUEST_URI'] = "/logout";

        $logInController = new LogOutClass();

        $logInController->logout();

        $this->assertEquals(isset($_SESSION), FALSE);
    }
}
