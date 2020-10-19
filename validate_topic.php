<?php
session_start();
require_once("links.php");
require_once("pdo.php");

if(isset($_POST['topic'])){
    $_SESSION['topic']=htmlentities($_POST['topic']);
    header("Location:topic.php");
    return;
}
else{
    header("Location:index.php");
    return;
}
?>