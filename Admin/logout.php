<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('ab', '', time() - 3600);
setcookie('cd', '', time() - 3600);

header("Location: login.php");
exit;

?>