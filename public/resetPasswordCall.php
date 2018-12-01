<?php
require_once "resetPassword";
resetPassword($_POST["password"],$_POST["confirm_password"], $pdo);
header("Location: editPage.php");