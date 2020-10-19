<?php
session_start();
require_once "pdo.php";
require_once "links.php";


if(!isset($_SESSION['login']))
{
    $_SESSION['error']="Please Log In";
    header("Location: login.php");
    return;
	
}

if(isset($_SESSION['test-submitted']) )
{
		if($_SESSION['test-submitted'] === true)
		{
			die("Test Submitted");
		}
}

if(isset($_POST['start-test']) && isset($_POST['topic']) && isset($_POST['difficulty']) && isset($_POST['offset']))
{
	
				$offset=htmlentities($_POST['offset']);
				if($offset==15 || $offset==0)
				{
					$stmt = $conn->prepare('SELECT * FROM questions where topic= :t AND difficulty= :d LIMIT 15 OFFSET '.$offset);
					$stmt->execute(array(':t'=>$_POST['topic'],':d'=>$_POST['difficulty']));
					$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

					if(count($row) === 0)
					{
						die("Quiz not available on this topic yet :(");
					}
					
					else
					{
						$_SESSION['topic']=$_POST['topic'];
						$_SESSION['difficulty']=$_POST['difficulty'];
						$_SESSION['offset']=$_POST['offset'];
						
					}	
				}
				else
					die("Something's wrong with OFFSET value");

}
else
	echo "<script> location.href='instructions.php' </script>";


?>

<!DOCTYPE html>
<html>
<head>
  <title>Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/quiz.css">
</head>
<body >

<div class="navbar">
	<h1  class="nav-brand"> 
		<span class="glyphicon glyphicon-fire"> </span>Quizxx
	</h1>
	<h2 >
		Time Remaining: 
		<span id="time-countdown"><?php echo($_SESSION['time'])?>:00</span>	
	</h2>
</div>


<div class="parent-container">
	<!-- QUIZ CONTAINER -->
	<div class="quiz-container p-4">
		<!-- QUIZ HEADING -->
		<h1 class="quiz-heading">
			Quiz on C++
		</h1>
		<!-- FORM -->
		<form action="result.php" method="POST">
			<?php
			$option_list=array(1=>"a). ", 2=>"b). ", 3=>"c). ",4=>"d). ");
				for($row_num=0;$row_num<count($row);$row_num++)
				{
			?>
				<!-- QUESTION LIST CONTAINER -->
				<div id="question-list" class="py-3">
					<!-- QUESTION -->
					<div class="question">
						<h2 class="font-weight-bold"> <?php echo($row_num+'1'.". ".$row[$row_num]['question_text']); ?></h2>
					</div>
					
					<?php
						for($option_num=1;$option_num<=4;$option_num++)
							{
					?>
					<!-- OPTIONS -->
					<div class="options">
						<!-- INPUT RADIO -->
					    <input type="radio"  class="input-radio" 
							value='<?php echo("Option-".$option_num); ?>'  name='<?php echo("Question".$row_num."-Option"); ?>'>
						<!-- CUSTOM INPUT -->
						<span class="checkmark"></span>
						<!-- OPTION TEXT -->
						<span class="option-text">
							<?php echo($option_list[$option_num].$row[$row_num]['option'.$option_num]); ?>
						</span> 
					</div>
					<!-- OPTIONS -->
					<?php 
						}
					?>

					<!-- CLEAR CHOICE -->
					<button type="button" class="btn btn-primary clear-option-btn">Clear Choice</button>
				</div>
			<!-- END OF QUESTION LIST -->
			<?php
				}
			?>
			<!-- SUBMIT QUIZ -->
			<input type="submit" name="submit" class="submit-test-btn btn-danger" name="submit-test" value="Submit Test">
			<input type="hidden" name="topic" value="<?php echo($_POST['topic']);?>">
            <input type="hidden" name="difficulty" value="<?php echo($_POST['difficulty']);?>">
		</form>
	</div>	<!-- END OF QUIZ CONTAINER -->

	<div class="take-me-up">
		<a href="#question-list"> <i class="fa fa-arrow-up" aria-hidden="true"></i></a>
	</div>
</div>
<!-- END OF PARENT CONTAINER -->

</body>

<script src="js/quiz.js"></script>
</html>