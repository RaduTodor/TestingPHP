<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LogOutTest extends TestCase
{
    public function logOutTest()
    {
        require_once "logOut.php";
        $_SERVER['REQUEST_URI'] = "/loginPage.php";
        logout();
        $this->assertEquals(
            isset($_SESSION),
            FALSE);
    }
}