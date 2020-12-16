<?php
require_once("pdo.php");
require_once("links.php");
/* if(isset($_POST['verify-pwd']))
{
if(isset($_POST['email']) && isset($_POST['pwd']))
{
		$stmt = $conn->prepare('SELECT email FROM users WHERE email = :em');
			$stmt->execute(array( ':em' => $_POST["email"]));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);	
			if($row===false)
			{
				echo"<script> alert('This Email is not registered')</script>";
				
			}
			else{
				$email=$row['email'];
				  $check = md5($_POST["pwd"]);
        
		$stmt = $conn->prepare('SELECT user_id,user_name FROM users WHERE email = :em AND pwd = :pw');
		$stmt->execute(array( ':em' => $email, ':pw' => $check));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
				if($row===false)
				{
					echo"<script> alert('Password does not match with the Registered Email ID')</script>";
					
				}
				else{
					$verified=true;
					echo"<script> alert('Passwords Match.You can set new Password Now')</script>";
				}
			}
}
} */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/login.css">
<style>
    
    *{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Commissioner', sans-serif;
	
}

html{
	font-size: 62.5%;
}
label{
	font-size: 2.2rem;
	color: #000000bf;
}
.main{
	height: 80vh;
}
.btn{
font-size: 2rem;
text-align: center;
}
.form-control{
	font-size: 1.8rem;
}
#verify-pwd-form{
display: flex; flex-direction: column;align-items:center;
}
#update-pwd-form{
	display: none;
}
.show{
	display: flex;align-items: center; flex-direction: column;
}
</style>
</head>
<body>
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
    <form method="POST" action="change-password.php"  id="verify-pwd-form">
        <div class="form-group">
            <label for="email">Enter Registered Email:</label>
			<input type="text" class="form-control" id="email" name="email">
		</div>
		<div class="form-group">
            <label for="password">Enter Old Password:</label>
			<input type="password" class="form-control" id="password" name="pwd">
		</div>
		<button type="button" class="btn btn-danger" name="verify-pwd" id="verify-pwd-btn">Verify Password</button>
	</form>
	
	<form method="post"  id="update-pwd-form">
	<h2 style="font-size: 2.2rem; text-align:center;   color: #ce1d1e;">Password matched with the Registered Email Id.<br/> You can set your new Password Now</h2>
		<div class="form-group mt-4">
			<label for="new_pwd">Enter New Password</label>
			<input type="password" class="form-control" id="new-password" name="new_pwd">
		</div>
		<input type="button" class="btn" id="change-pwd-btn" value="Update Password" style="background-image: linear-gradient(to right, #2ecc71, #27ae60, #2ecc71);color: #f2fff9;width:50%">
	</form>
</div>
    
</body>
</html>
<script>
$(document).ready(function(){
$("#verify-pwd-btn").click(()=>{
	localStorage.clear('verified');
	
	const email=$("#email").val();
	const pwd=$("#password").val();
	if(email && pwd)
	{
	$.ajax({
                  url: "fetch-user.php",
                  method:"POST",
                  data:{email:email,pwd:pwd},
                  success:function(response)
                  {
				arr=JSON.parse(response);
					if(arr[0]['verified'])
					{
						$("#verify-pwd-form").hide();
						$("#update-pwd-form").removeAttr('id','update-pwd-form').addClass('show');
						localStorage.setItem('verified',true)
						sessionStorage.setItem('uid',arr[0]['user_id'])

					}
					else{
						alert("Password does not match with the Registered Email ID")
					}
                 
                  }
                });
	}
	else{
		alert("Both Fields are Required")
	}
	});

	$("#change-pwd-btn").click(()=>{
		
if(localStorage.getItem('verified'))
{
	
	const newPwd=$("#new-password").val();
	const userId=sessionStorage.getItem('uid');
	if(newPwd)
	{
	$.ajax({
                  url: "update-password.php",
                  method:"POST",
                  data:{newPwd:newPwd,userId:userId},
                  success:function(response)
                  {
					window.location.href="login.php";
					alert("Password Changed Successfully")
					sessionStorage.clear();
                 
                  }
                });
	}
	else{
		alert("Please Enter New Password")
	}

}
else{
	window.location.href="login.php";
}
	})


})

</script>