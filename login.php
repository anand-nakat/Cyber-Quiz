<?php
    session_start();
    require_once "pdo.php";
    require_once "util.php";
    $salt = 'XyZzy12*_';
 
if (isset($_POST["login_email"]) && isset($_POST["login_password"]) ) 
{
 $msg=login_validate($salt,$conn);
	
	if(is_string($msg))
	{
		$_SESSION["error"]=$msg;
		header("location:login.php");
		return;
	}

header("Location: index.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/login.css">

  
</head>
<body >
	
		<nav class="navbar navbar-expand-md navbar-light px-5">

		<a class="navbar-brand" href="index.php"> 
			<span class="glyphicon glyphicon-fire"> </span>Quizxx
		</a>

		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    				<span class="navbar-toggler-icon"></span>
  			</button>



		<div class="collapse navbar-collapse pr-4" id="collapsibleNavbar">
			<ul class="navbar-nav nav-pills  ml-auto">
				<li class="nav-item  pr-4">
					<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active pr-4">
					<a class="nav-link" href="login.php" style="color: #ce1d1e;">Login</a>
				</li>
				<li class="nav-item pr-4">
					<a class="nav-link" href="signup.php">Sign Up</a>
				</li>
			</ul>
		</div>
			
		</nav>
	
	
<div class="main">
	<div class="row container-fluid">
<div class="col-lg-4 col-md-6  img-fluid">
	<div class="quiz-img">
	<img src="img/login-avatar-1.svg" alt="">
	</div>
</div>

	
<div class="col-lg-8 col-md-6 col-12">

	<div class="login-main">
	<div class="loginbox">
			 <h1>LOGIN</h1>
			 <?php
				if ( isset($_SESSION["error"]) ) {
					echo('
					<div class="text-capitalize font-weight-bold mt-3 text-left" id="error_message">
						'.htmlentities($_SESSION["error"]).
					"</div>"	);
					unset($_SESSION["error"]);
				}
			?>
		<form method="post" autocomplete="off" class="mt-5">

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" name="login_email" placeholder="Email/Username" value="">
				
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" name="login_password" placeholder="Password" value="" >
				
			</div>

			<input type="submit" class="btn" name="submit" value="Sign In">
		</form>


			<input type="button" class="btn signup-btn" name="" value="Sign Up" onclick="window.location.href='signup.php';">
			<div style="font-size: 2.3rem;">New User? Sign Up!</div>			
	</div>
</div>
</div>
</div>
		
    
   
	
	

</body>
</html>