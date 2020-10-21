<?php
 session_start();
 date_default_timezone_set("Asia/Kolkata");
require_once "pdo.php";
$offset= $_SESSION['offset'];
    if($_SESSION['offset']==0 || $_SESSION['offset']==15)
    {
        $stmt = $conn->prepare('SELECT correct_option FROM questions where topic= :t AND difficulty= :d LIMIT 15 OFFSET '.$offset);
        $stmt->execute(array(':t'=>$_SESSION['topic'],':d'=>$_SESSION['difficulty'] ));
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['test-submitted']=true;
        

        $correct_ans=0;
        $attempted=0;
        $total_questions=count($row);

        for($i=0;$i<$total_questions;$i++)
        {
            if(isset($_POST["Question".$i."-Option"]))
            {
                if($_POST["Question".$i."-Option"]==$row[$i]['correct_option'])
                {
                    $correct_ans++;
                } 
                $attempted++;
                $_SESSION['Question'.$i.'-Option']=$_POST["Question".$i."-Option"];
            }        
        }

        $percent=round(($correct_ans/$total_questions)*100);
        $score=$correct_ans*$_SESSION['marks'];
        $total_marks=$total_questions*$_SESSION['marks'];
        $dt1=date("Y-m-d");
        $dt2=date("H:i:s");

        $stmt2 = $conn->prepare('INSERT INTO test_history (user_id,topic,difficulty,score,attempt_date,attempt_time)
						VALUES ( :u, :t,:d, :s,:adate,:atime)');
        $stmt2->execute(array(
        ':u' => $_SESSION['user_id'],
        ':t' => $_SESSION['topic'],
        ':d' => $_SESSION['difficulty'],
        ':s' => $percent,
        ':adate' => $dt1,
        ':atime' => $dt2));

        $_SESSION['percent']=$percent;
        $_SESSION['total_questions']=$total_questions;
        $_SESSION['score']=$score;
        $_SESSION['total_marks']=$total_marks;
        $_SESSION['attempted']=$attempted;
        $_SESSION['correct_ans']=$correct_ans;

        header(("Location:result.php"));
        return;
        
    }
    else    
        die("Something Wrong..");

        ?>