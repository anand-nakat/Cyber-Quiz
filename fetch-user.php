<?php
require_once("pdo.php");
if(isset($_POST['email']) && isset($_POST['pwd']))
{
    // echo($_POST['userId']);
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = :em');
    $stmt->execute(array( ':em' => $_POST["email"]));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);	
    
    if($row!==false) 
	{
        if(md5($_POST['pwd'])==$row['pwd'])
        {
            $return_arr[] = array("user_id" => $row['user_id'],
                    "verified" => true);
                  
                }
                else{
                    $return_arr[] = array("user_id" => $row['user_id'],
                    "verified" => false);
                }
                echo json_encode($return_arr);
    /* $return_arr[] = array("user_id" => $row['user_id'],
                    "email" => $row['email'],
                    "password" => $row['pwd']);
                  
        echo json_encode($return_arr); */
        
    }
    else
	echo "Email ID Does not Exist";
}
else{
echo("POST Data Not Set");
}
?>