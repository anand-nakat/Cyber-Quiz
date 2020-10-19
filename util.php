<?php
 function signup_insert_validate($salt,$conn)
 {

	if(strlen($_POST['new_password']) >= 1 && strlen($_POST['new_email']) >= 1 && strlen($_POST['new_username']) >= 1)
		{
			if(strlen($_POST['new_username'])<4)		
				return ("Name must be atleast 3 characters long");

			  if (strpos($_POST['new_email'],'@') === false || strpos($_POST['new_email'],'.')===false || ( (strlen($_POST['new_email']) -strpos($_POST['new_email'],'@')) < 4 ) || ( (strlen($_POST['new_email']) -strpos($_POST['new_email'],'.')) < 3 )) 
					return "Please Provide Valid Email";

			
			if(strlen($_POST['new_password'])<4)		
				return ("Password must be atleast 4 characters long");

			/*Check if the email is already registered*/	
			$stmt = $conn->prepare('SELECT email FROM users WHERE email = :em');
			$stmt->execute(array( ':em' => $_POST["new_email"]));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);	
						
				if($row !== false)
				{
					return "This email id is already registered";;
				}

				else
				{        
					$pass = md5($_POST["new_password"]);
					$stmt = $conn->prepare('INSERT INTO users (user_name,email,pwd,is_admin)
						VALUES ( :u, :e, :p,:ia)');
					$stmt->execute(array(
					':u' => $_POST['new_username'],
					':e' => $_POST['new_email'],
					':p' => $pass,
					':ia' => 0));
				}
		}
	
		else
			return "All fields are Required";
			
}

function login_validate($salt,$conn)
{

	if ( strlen($_POST['login_password']) >= 1 && strlen($_POST['login_email']) >= 1)
	{
		
        $check = md5($_POST["login_password"]);
        //Check if input matches with registered user name
		$stmt = $conn->prepare('SELECT user_id,user_name,is_admin FROM users WHERE user_name = :em AND pwd = :pw');
		$stmt->execute(array( ':em' => $_POST["login_email"], ':pw' => $check));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

           //If matches, then true
           if ( $row !== false ) 
             {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION["login"]=true;
				$_SESSION['is_admin'] = $row['is_admin'];
             }
             //else check if it matches with registered email
              else
              {
              	$stmt = $conn->prepare('SELECT user_id,user_name FROM users WHERE email = :em AND pwd = :pw');
              	$stmt->execute(array( ':em' => $_POST["login_email"], ':pw' => $check));
              	$row = $stmt->fetch(PDO::FETCH_ASSOC);
              	
              		//If matches good
						if ( $row !== false ) 
              		    {
              			   $_SESSION['user_name'] = $row['user_name'];
						   $_SESSION['user_id'] = $row['user_id'];
						   $_SESSION['is_admin'] = $row['is_admin'];
              		       $_SESSION["login"]=true;
              		    }
              	
						else
						return "Incorrect Credentials";
              }
    }
    else
    	return "all fields are required";
		
}
?>