<?php
require_once 'pdo.php';

if(isset($_POST['topic']) && isset($_POST['question1']) && isset($_POST['correct_option1']))
{
	for($i=1; $i<=15; $i++) 
	{
	    if ( ! isset($_POST['question'.$i])) 
	    	continue;
	    if ( !isset($_POST['option'.$i.'A']) || !isset($_POST['option'.$i.'B']) || !isset($_POST['option'.$i.'C']) ||  !isset($_POST['option'.$i.'D']) ) 
	    	continue;

	    $topic=($_POST['topic']);
	    $difficulty=($_POST['difficulty'.$i]);
	    $question=($_POST['question'.$i]);
	    $option_A=($_POST['option'.$i.'A']);
	    $option_B=($_POST['option'.$i.'B']);
	    $option_C=($_POST['option'.$i.'C']);
	    $option_D=($_POST['option'.$i.'D']);
	    $correct_option='Option-'.($_POST['correct_option'.$i]);

	    $stmt= $conn->prepare("INSERT INTO questions (question_text,option1,option2,option3,option4,correct_option,topic,difficulty)  VALUES 
	    	( :q, :o1, :o2, :o3, :o4, :co,:t,:d) ");
	    $stmt->execute(array(
		  ':q'  => $question,
		  ':o1' => $option_A,
		  ':o2' => $option_B,
		  ':o3' => $option_C,
		  ':o4' => $option_D,
		  ':co' => $correct_option,
		  ':t'  => $topic,
		  ':d'  => $difficulty));
		echo "<script> alert('Added To Database Successfully!!'); </script>";
	    echo "<script> location.href='add-question.php' </script>";
	    
	}
}
else{
	echo "<script> alert('Language Not set'); </script>";
}

?>