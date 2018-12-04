<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\classes\LogOutClass;

final class LogOutTest extends TestCase
{
    public function __construct()
    {
        header("/logout");
        $_SERVER['REQUEST_URI'] = "/logout";

        $logInController = new LogOutClass();
        $logInController->logout();

        $this->assertEquals(isset($_SESSION), FALSE);
    }
}