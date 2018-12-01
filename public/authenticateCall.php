<?php
require_once "authenticate.php";
$authenticateSucceeded = authenticateUser($_POST["username"],$_POST["password"], $pdo);
if($authenticateSucceeded)
{
    header("Location: index.php");
}
else
{
    header("Location: loginPage.php");
}