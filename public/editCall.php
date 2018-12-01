<?php
require_once "editProfile.php";
editProfile($_POST["username"],$_POST["email"],$_POST["birth_date"],$_POST["first_name"],$_POST["last_name"],$_POST["gender"], $pdo);
header("Location: editPage.php");