<?php
session_start();
require_once("links.php");

if(isset($_POST['topic']) && isset($_POST['difficulty']) && isset($_POST['offset']))
{
    $_SESSION['topic']=htmlentities($_POST['topic']);
    $_SESSION['difficulty']=htmlentities($_POST['difficulty']);
    $_SESSION['offset']=htmlentities($_POST['offset']);
                
        switch ( $_SESSION['difficulty']) 
        {
            case "easy":
                $_SESSION['marks']=1;
                $_SESSION['total_marks']=15;
                $_SESSION['time']=15;
                break;
            case "average":
                $_SESSION['marks']=2;
                $_SESSION['total_marks']=30;
                $_SESSION['time']=20;
                break;
            case "hard":
                $_SESSION['marks']=3;
                $_SESSION['total_marks']=55;
                $_SESSION['time']=25;
                break;
        }
        header("Location:instructions.php");
        return;
}
else
    die("Not allowed");

?>
