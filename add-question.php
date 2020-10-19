<?php
require_once 'pdo.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Questions</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
</head>
<style type="text/css">

	body{
		background-color: #f1f2f6;
	}
	input{
		margin-bottom: 1rem;
	}
	input[type=text]{
		width: 100%;
	}
	.question{
		margin-bottom: 1rem;
		border-bottom: .2rem solid black;
	}

	#submit-btn{
		position: fixed;
		bottom: .5rem;
		right: 1rem;
		width: max-content;
		padding: .5rem;

	}
</style>
<body>

<div class="container my-3">

	<form method="POST" autocomplete="off" action="add-question-database.php">

		<h4>Quiz Topic </h4>
		<input type="text" class="w-25" name="topic" required><br/>
		<hr class="w-100 bg-dark">
		
		<div class="question-list">
			<div class="question question1">
				<h4>Question No 1</h4>
				<input required type="text" name="question1" placeholder="Enter Question Here"><br/>

				<h4>Difficulty</h4>
				  
				<input required type="radio" name="difficulty1" value="easy">Easy <br/>
				<input required type="radio" name="difficulty1" value="average">Average <br/>
				<input required type="radio" name="difficulty1" value="difficult"> Difficult <br/>

				<h4>Option 1 </h4>
				<input required type="text" name="option1A"><br/>

				<h4>Option 2 </h4>
				<input required type="text" name="option1B"><br/>

				<h4>Option 3 </h4>
				<input required type="text" name="option1C"><br/>

				<h4>Option 4 </h4>
				<input required type="text" name="option1D"><br/>

				<h4>Correct Option </h4>
				<input required type="text" name="correct_option1" class="mb-4"><br/>
			</div>
		</div>			

			<button type="button" id="add-btn" class="btn btn-primary">Add More Question +</button>
			<input type="submit" id="submit-btn" class="btn btn-success" value="Add All Questions to Database">
		</form>
</div>




</body>
<script type="text/javascript">
	var question_count=1;
$("#add-btn").click(function(event) {
	event.preventDefault();
        if ( question_count >= 15 ) {
            alert("Maximum of fifteen position entries exceeded");
            return;
        }
        question_count++;
        window.console && console.log("Adding position "+question_count);
        $('.question-list').append(
            '<div class="question question'+ question_count+'"> \
            <h4>Question No '+question_count+' </h4> <input required type="text" name="question'+question_count+'" placeholder="Enter Question Here"><br/>\
            <h4>Difficulty</h4><input required type="radio" name="difficulty'+question_count+'" value="easy">Easy<br/>\
					<input required type="radio" name="difficulty'+question_count+'" value="average">Average<br/>\
					<input required type="radio" name="difficulty'+question_count+'" value="difficult">Difficult<br/>\
            <h4>Option 1 </h4><input required type="text" name="option'+question_count+'A"><br/>\
			<h4>Option 2 </h4><input required type="text" name="option'+question_count+'B"><br/>\
			<h4>Option 3 </h4><input required type="text" name="option'+question_count+'C"><br/>\
			<h4>Option 4 </h4><input required type="text" name="option'+question_count+'D"><br/>\
			<h4>Correct Option </h4><input required type="text" name="correct_option'+question_count+'" class="mb-4"><br/>\
            <input type="button" class="btn btn-danger" style="width:max-content" value="Remove This Question" \
                onclick="$(\'.question'+question_count+'\').remove();return false;"></p> \
            </div>');
});


</script>
</html>