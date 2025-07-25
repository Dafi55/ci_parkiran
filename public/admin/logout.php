<?php
session_start();
session_destroy();
header("Location: pages/authen/auth-login-basic.php");
exit();

session_start();
var_dump($_SESSION);  // Debugging session
?>
