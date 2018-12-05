<?php
/**
 * Created by PhpStorm.
 * User: todor
 * Date: 12/5/2018
 * Time: 12:46 AM
 */

use App\classes\DatabaseConnection;

class DatabaseConnectionTest extends \Codeception\Test\Unit
{

    public function testCreateDatabaseConnectionNotNull()
    {
        $databaseConnectionInstance = new DatabaseConnection();
        $this->assertNotNull($databaseConnectionInstance->CreateDatabaseConnection());
    }

    public function testCreateDatabaseConnectionBadConnection()
    {
        $databaseConnectionInstance = new DatabaseConnection();
        $this->expectException(PDOException::class);
        $databaseConnectionInstance->CreateDatabaseConnection("notRealDatabaseName");
    }
}
