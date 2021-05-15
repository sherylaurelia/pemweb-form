<?php
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $par = session_get_cookie_params();
    setcookie(session_name(), '', time()-3600,
        $par["path"], $par["domain"],
        $par["secure"], $par["httponly"]
    );
}
unset($_SESSION['login']);
session_destroy(); // destroy session
header("location:login.php"); 
?>