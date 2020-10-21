<?php
session_start();
require_once "pdo.php";
require_once "links.php";

if(!isset($_SESSION['login'])){
    die("User Not Logged In");
}

if(isset($_SESSION['user_id']))
{
    $stmt=$conn->prepare("SELECT * FROM test_history WHERE user_id=:uid ORDER BY attempt_date DESC, attempt_time DESC");
    $stmt->execute(array(":uid"=>$_SESSION['user_id']));
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
}
else
    die("User Not Logged In");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attempt History</title>
    <link rel="stylesheet" type="text/css" href="css/instructions.css">
    <link rel="stylesheet" type="text/css" href="css/score history.css">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark px-3 fixed-top" style="background:#130b00;border-bottom: .1rem solid whitesmoke;">
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
                <a class="nav-link" href="score history.php" style="color:yellowgreen !important;">Attempt History</a>
            </li>
            <li class="nav-item pr-4">
                <a class="nav-link" href="logout.php">Log Out</a>
            </li>
        </ul>
    </div>
</nav>

<div class="parent-container">
    <h1 class="page-heading">
        Attempt History
    </h1>
    <?php 
    if(count($row)>0)
    {
    ?>
        <div class="table-container">
            <table class="table">
                <tr class="row-heading">
                    <th>Test Topic</th>
                    <th>Difficulty</th>
                    <th>Score</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php 
                for($i=0;$i<count($row);$i++)
                {
                    echo"
                    <tr class='row-data'>
                        <td class='row-topic'>".$row[$i]['topic']."</td>
                        <td>".$row[$i]['difficulty']."</td>
                        <td>".$row[$i]['score']."%</td>
                        <td>".$row[$i]['attempt_date']."</td>
                        <td>".$row[$i]['attempt_time']."</td>
                    </tr>"; 
                }?>
            </table>
        </div>
    <?php }
    else{
        echo"<div class='message'>
                Looks like you haven't attempted any quiz. You can see your Score History on this Page.
            </div>";
    }
    ?>

</div>
    
</body>
</html>