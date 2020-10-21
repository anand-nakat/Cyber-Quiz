<?php
 session_start();
 date_default_timezone_set("Asia/Kolkata");
require_once "pdo.php";
require_once "links.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/instructions.css">
    <link rel="stylesheet" type="text/css" href="css/result.css">
	<title>Result</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark px-3 fixed-top">
    <a class="navbar-brand" href="index.php" > 
        <span class="glyphicon glyphicon-fire"> </span>Quizxx
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse pr-4" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item  pr-4">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item pr-4">
                <a class="nav-link" href="attempt history.php">Attempt History</a>
            </li>
            <li class="nav-item pr-4">
                <a class="nav-link" href="logout.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>

<main>

<div class="result-container p-4">
    <h1 class="result-heading text-center text-uppercase mb-5">
        result
    </h1>
    <div class="result mb-5">
        <h2>Total Questions: <strong><?php echo($_SESSION['total_questions'])?></strong></h2>
        <h2>Attempted Questions: <strong><?php echo($_SESSION['attempted'])?></strong></h2>
        <h2>Correctly Answered: <strong><?php echo($_SESSION['correct_ans'])?></strong></h2>
        <h2>Total Score: <strong><?php echo($_SESSION['score'].'/'.$_SESSION['total_marks'])?></strong></h2>
        <h2>Score Percentage: <strong><?php echo($_SESSION['percent'].'%')?></strong></h2>
        
    </div>
    <div class="links">
        <form method="POST" action="validate_instructions.php">
            <input type="hidden" name="topic" value="<?php echo($_SESSION['topic']); ?>" >
            <input type="hidden" name="difficulty" value="<?php echo($_SESSION['difficulty']); ?>">
            <input type="hidden" name="offset" value="<?php echo($_SESSION['offset']); ?>">
            <input type="submit" class="btn btn-info mx-auto mt-2 text-center" value="Attempt Again" style="position: relative;left: 50%;transform: translateX(-50%);">
        </form>
        <button class="btn btn-success mx-auto mt-2 text-center" onclick="window.location.href='index.php'">Explore More</button>
        <button class="btn mx-auto mt-2 text-center" style="background:#b33771;color:white" onclick="window.location.href='review.php'">Review Test</button>
    </div>
</div>




</main>

</body>
</html>