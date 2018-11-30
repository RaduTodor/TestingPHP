<?php
function Verify()
{
    session_start();
    if(!empty($_SESSION["username"]))
    {
        echo("Rise and shine mister ".$_SESSION["username"]);
    }
    else
    {
        header("Location: index.php");
    }
}

Verify();