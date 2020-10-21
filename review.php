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

if(!isset($_SESSION['test-submitted']) )
{
			die("Test has to be submitted first");
}

else{
        if(isset($_SESSION['topic']) && isset($_SESSION['difficulty']) && isset($_SESSION['offset']))
        {
            
                        $offset=htmlentities($_SESSION['offset']);
                        if($offset==15 || $offset==0)
                        {
                            $stmt = $conn->prepare('SELECT * FROM questions where topic= :t AND difficulty= :d LIMIT 15 OFFSET '.$offset);
                            $stmt->execute(array(':t'=>$_SESSION['topic'],':d'=>$_SESSION['difficulty']));
                            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if(count($row) === 0)
                            {
                                die("Review not available on this topic yet :(");
                            }
                   
                        }
                        else
                            die("Something's wrong with OFFSET value");

        }
        else
            echo "<script> location.href='instructions.php' </script>";
}            


?>

<!DOCTYPE html>
<html>
<head>
  <title>Quiz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/quiz.css">
</head>
<style>
	.color-scheme{
		justify-content: space-between;
		width: 100%;
	}
	.img-blob{
		height: 10px;
		width: 10px;
	}
</style>
<body >

<div class="navbar">
	<h1  class="nav-brand"> 
		<span class="glyphicon glyphicon-fire"> </span>Quizxx
	</h1>
	<button type="button" class="btn btn-danger" style="font-size: 1.5rem;" onclick="window.location.href='index.php'">End Review</button>
</div>


<div class="parent-container">
	<!-- QUIZ CONTAINER -->
	<div class="quiz-container p-4">
		<!-- QUIZ HEADING -->
		<h1 class="quiz-heading">
			Review on <?php echo($_SESSION['topic']);?>
			<?php echo($_SESSION['Question0-Option']);?>
		</h1>
		
		<div class="color-scheme d-flex my-2 mb-3">
			<h2 class="font-weight-bold">Color Scheme: </h2>
				<div>
					<img class="img-blob" src="img/blue-blob.png">Correctly Answered
				</div>
				<div>
					<img class="img-blob" src="img/green-blob.png"> Correct Answer 
				</div>
				<div>
					<img class="img-blob" src="img/red-blob.png"> Your Answer
				</div>
		</div>
		<!-- FORM -->
			<?php
			$option_list=array(1=>"a). ", 2=>"b). ", 3=>"c). ",4=>"d). ");
				for($row_num=0;$row_num<count($row);$row_num++)
				{
					
			?>
				<!-- QUESTION LIST CONTAINER -->
				<div id="question-list" class="py-3">
	
					<div class="question">
						<h2 class="font-weight-bold"> <?php echo($row_num+'1'.". ".htmlentities($row[$row_num]['question_text'])); ?></h2>
					</div>
					
					<?php
						for($option_num=1;$option_num<=4;$option_num++)
							{
								$color="black";
								$font_wt="500";

								if($row[$row_num]['correct_option']== "Option-".$option_num){
									$color="#20bf6b";
									$font_wt= "600";
								}

								if(isset($_SESSION['Question'.$row_num.'-Option']))
								{
									$user_ans=$_SESSION['Question'.$row_num.'-Option'];
									
										if($user_ans == "Option-".$option_num && $user_ans!=$row[$row_num]['correct_option']){
											$color="#eb3b5a";
											$font_wt= "600";
										}
										if($user_ans == "Option-".$option_num && $user_ans==$row[$row_num]['correct_option']){
											$color= "#4a69bd";
    										$font_wt= "600";
										}
								}

								
								
					?>
					
					<div class="options ml-4" style="<?php echo("color:".$color.";font-weight:".$font_wt);?>">
							<?php echo($option_list[$option_num].htmlentities($row[$row_num]['option'.$option_num])); ?>
					</div>
					
					<?php 
						}
					?>

				</div>
			<!-- END OF QUESTION LIST -->
			<?php
				}
			?>
	
	</div>	<!-- END OF QUIZ CONTAINER -->

	<div class="take-me-up">
		<a href="#question-list"> <i class="fa fa-arrow-up" aria-hidden="true"></i></a>
	</div>
</div>
<!-- END OF PARENT CONTAINER -->

</body>

<!-- <script src="js/quiz.js"></script> -->
</html>