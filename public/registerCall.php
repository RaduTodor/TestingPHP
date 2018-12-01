<?php
require_once "register.php";
registerUserInDb($_POST["username"],$_POST["password"],$_POST["email"], $pdo);
require_once "authenticateCall.php";