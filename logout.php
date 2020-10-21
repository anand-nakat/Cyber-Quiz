<?php // line added to turn on color syntax highlight

session_start();
unset($_SESSION['user_name']);
unset($_SESSION['login']);
session_unset();
session_destroy();
header('Location: index.php');
?>