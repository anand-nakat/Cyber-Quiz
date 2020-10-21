<?php
session_start();
require_once("links.php");


if(!isset($_SESSION['login']))
{
    $_SESSION['error']="Please Log In";
    header("Location: login.php");
    return;
	
}


if(isset($_SESSION['test-submitted']))
    {
        unset($_SESSION['test-submitted']);
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/instructions.css">
    <title>Instructions</title>
</head>
<body>
<!-- <script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script>  -->

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
    <div class="instruction-container p-4">
        <h1 class="instruction-heading text-center text-uppercase mb-5">
            Instructions
        </h1>
        <div class="test-details mb-3">
                <h2> Test Topic: <?php echo($_SESSION['topic']); ?>  </h2>
                <h2> Difficulty: <?php echo($_SESSION['difficulty']) ?>  </h2>
        </div>
        <div class="instructions">
            <h2>1. This test contains <strong>15</strong> Mutliple Choice Questions.</h2>
            <h2>2. Each Question will have 4 options, with only 1 correct option.</h2>
            <h2>3. The quiz will have a timer running, once you run out of time the test will be automatically submitted.</h2>            
            <h2>4. Each Question is of worth <strong><?php echo($_SESSION['marks'])?> Marks</strong>. There is <strong>No Negative Marking</strong></h2>
            <h2>5. Once you complete the test, you can click on Submit Button to end the test.</h2>
            <h2>6. Time allowed for test: <strong><?php  echo($_SESSION['time'])?> min</strong></h2>
        </div>
        <form method="POST" action="quiz.php" class="form mt-4">
            <input type="submit" class="btn btn-success submit-btn" name="start-test" value="Start Test">
            <input type="hidden" name="topic" value="<?php echo($_SESSION['topic']); ?>" >
            <input type="hidden" name="difficulty" value="<?php echo($_SESSION['difficulty']); ?>">
            <input type="hidden" name="offset" value="<?php echo($_SESSION['offset']); ?>">
        </form>
        <button class="btn btn-primary mx-auto mt-2  w-25 text-center" style="font-size: 1.6rem;" 
        onclick="window.location.href='index.php'">Go Back</button>
    </div>
</main>
    

</body>
</html>