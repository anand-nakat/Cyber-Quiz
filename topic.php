<?php
session_start();
require_once("links.php");
require_once("pdo.php");

if(!isset($_SESSION['login']))
{
    $_SESSION['error']="Please Log In";
    header("Location: login.php");
    return;
	
}

if(!isset($_SESSION['topic'])){
    header("Location:index.php");
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic</title>
    <link rel="stylesheet" type="text/css" href="css/instructions.css">
    <link rel="stylesheet" type="text/css" href="css/topic.css">
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
                <a class="nav-link" href="signup.php">Your Scores</a>
            </li>
            <li class="nav-item pr-4">
                <a class="nav-link" href="login.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="parent-container">
    <div class="topic-heading">
        Quizes on <?php echo($_SESSION['topic'])?>
    </div>
    <div class="test-filter-container container-fluid">
        <div class="test-container">
            
			<div class="difficulty easy px-4 py-2" > 
                <div class="block-heading">
                    <h2><?php echo($_SESSION['topic'])?></h2>
                    <form method="POST" action="validate_instructions.php">
                        <input type="hidden" name="topic" value="<?php echo($_SESSION['topic'])?>" >
                        <input type="hidden" name="difficulty" value="easy">
                        <input type="hidden" name="offset" value="0">
                        <input type="submit" class="btn submit-btn" name="start-test" value="Start Test">
                    </form>
                </div>
                <div class="block-footer">
                    <h3>Difficulty: <span class="text-success"> Easy </span> </h3>
                    <h3>Max-Marks: 15</h3>
                </div>
            </div>

			<div class="difficulty easy px-4 py-2">
                <div class="block-heading">
                    <h2><?php echo($_SESSION['topic'])?></h2>
                     <form method="POST" action="validate_instructions.php">
                        <input type="hidden" name="topic" value="<?php echo($_SESSION['topic'])?>" >
                        <input type="hidden" name="difficulty" value="easy">
                        <input type="hidden" name="offset" value="15">
                        <input type="submit" class="btn submit-btn" name="start-test" value="Start Test">
                    </form>
                </div>
                <div class="block-footer">
                    <h3>Difficulty: <span class="text-success"> Easy </span> </h3>
                    <h3>Max-Marks: 15</h3>
                </div>
            </div>

			<div class="difficulty average px-4 py-2">
                <div class="block-heading">
                    <h2><?php echo($_SESSION['topic'])?></h2>
                     <form method="POST" action="validate_instructions.php">
                        <input type="hidden" name="topic" value="<?php echo($_SESSION['topic'])?>" >
                        <input type="hidden" name="difficulty" value="average">
                        <input type="hidden" name="offset" value="0">
                        <input type="submit" class="btn submit-btn" name="start-test" value="Start Test">
                    </form>
                </div>
                <div class="block-footer">
                    <h3>Difficulty: <span style="color:#f0932b"> Average </span> </h3>
                    <h3>Max-Marks: 30</h3>
                </div>
            </div>

			<div class="difficulty hard px-4 py-2" >
                <div class="block-heading">
                    <h2><?php echo($_SESSION['topic'])?></h2>
                     <form method="POST" action="validate_instructions.php">
                        <input type="hidden" name="topic" value="<?php echo($_SESSION['topic'])?>" >
                        <input type="hidden" name="difficulty" value="hard">
                        <input type="hidden" name="offset" value="0">
                        <input type="submit" class="btn submit-btn" name="start-test" value="Start Test">
                    </form>
                </div>
                <div class="block-footer">
                    <h3>Difficulty: <span class="text-danger"> Hard </span> </h3>
                    <h3>Max-Marks: 45</h3>
                </div>
            </div>

        </div>
        <div class="filter-container">
            <h2>Filter</h2>
                <form>
                    <input type="checkbox" id="all-check" value="difficulty" name="all" checked>
                    <label class="label" for="all"> All</label><br>

                    <input type="checkbox" value="easy" name="easy">
                    <label class="label" for="Easy"> Easy</label><br>
                    
                    <input type="checkbox"  value="average" name="average">
                    <label class="label" for="Average"> Average</label><br>
                    
                    <input type="checkbox"  value="hard" name="hard">
                    <label class="label" for="Hard"> Hard</label><br>

                    <button type="button" class="btn btn-success filter-close-btn">Apply</button>
                </form>
        </div>
        
        <div class="filter-btn-div">
                <i class="fa fa-filter" aria-hidden="true"></i>
        </div>
    </div>
</div>

<script src="js/topic.js"></script>

</body>
</html>