<?php
session_start();
if ( isset( $_COOKIE[session_name()] ) )
setcookie( session_name(), "", time()-3600, "/" );
$_SESSION = array();
session_destroy();
if(($_SERVER['REQUEST_URI'])!="/index.php")
{
    header("Location: index.php");
}