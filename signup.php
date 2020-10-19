
<?php
session_start();
$salt = 'XyZzy12*_';
    require_once "pdo.php";
    require_once "util.php";

if ( isset($_POST["new_email"]) && isset($_POST["new_password"]) && isset($_POST["new_username"])) 
{
 
 $msg=signup_insert_validate($salt,$conn);

	if(is_string($msg))
	{
		$_SESSION["error"]=$msg;
		header("location:signup.php");
		return;
	}

header("Location: login.php");
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&family=Ubuntu&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Commissioner&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/signup.css">

</head>
<body >
	
<nav class="navbar navbar-expand-md navbar-light px-5">

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
				<li class="nav-item active pr-4">
					<a class="nav-link" href="signup.php" style="color:#9a38ab;">Sign Up</a>
				</li>
				<li class="nav-item pr-4">
					<a class="nav-link" href="login.php">Log In</a>
				</li>
			</ul>
		</div>
</nav>

<div class="main">
	<div class="row container-fluid">
<div class="col-lg-4 col-md-6  img-fluid">
	<div class="quiz-img">
	<img src="img/signup-avatar.svg" alt="">
	</div>
</div>
	

   
  <div class="col-lg-8 col-md-6 col-12">
  <div class="signup-main">
	<div class="signupbox">
			<h1>SIGN UP</h1>
			<div class="text-capitalize font-weight-bold mt-3 text-left error_message_js">

			</div>

			<?php
				if ( isset($_SESSION["error"]) ) {
					echo ('
					<div class="font-weight-bold mt-3 text-left error_message">
						'.($_SESSION["error"]).
					"</div>"	);
					unset($_SESSION["error"]);
				}
			?>

			
		<form method="post" autocomplete="off" class="mt-5" >

			<div class="s_textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input class="s_input" type="text" id="u_name" name="new_username" placeholder="Username" value="">
			</div>
			
			<div class="s_textbox">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<input class="s_input" type="text" id="email" name="new_email" placeholder="Email" value="">
			</div>

			<div class="s_textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input class="s_input" type="password" id="pwd" name="new_password" placeholder="Password" value="">
			</div>

			<input type="submit" class="btn_signup" name="submit"  value="Register">
		</form>
		</div>
	</div>

</div>
</div>
</div>
<script>

$(document).ready(function() {
	$(".error_message_js").css("display","none");

	$("#u_name").keyup(function(event) {
			var name= $(this).val();
			if(name.length < 3)
			{
				$(".error_message_js").html("Name must have atleast <br/> 3 characters");
				$(".error_message_js").slideDown();
			}
			else{
				$(".error_message_js").slideUp();
				$(".error_message_js").html("");
			}
		});	

	$("#email").keyup( function(event){
		let email=$(this).val();
		let pos=email.indexOf('@') ;
		let pos2=email.indexOf('.') ;
		if(email.length>=2){
		
		if(pos == -1 || pos >=(email.length-4) || pos2 == -1 || pos2 >=(email.length-2))
				{
					$(".error_message_js").html("Enter Valid Email");
					$(".error_message_js").slideDown();
				}

			else{
				$(".error_message_js").slideUp();
				$(".error_message_js").html("");
			}
		}	
	});

	$("#pwd").keyup(function(event) {
		let pwd= $(this).val();
			if(pwd.length < 4)
			{
				$(".error_message_js").html("Password must have atleast 4 <br/> characters");
				$(".error_message_js").slideDown();
			}
			else{
				$(".error_message_js").slideUp();
				$(".error_message_js").html("");
			}
		});	
});
</script>
   
	

</body>
</html>