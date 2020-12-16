<?php
require_once("pdo.php");
if(isset($_POST['userId']) && isset($_POST['newPwd']))
{
    // echo($_POST['userId']);
    $pwd=md5($_POST['newPwd']);
    $stmt = $conn->prepare('UPDATE users set pwd =:p WHERE user_id = :uid');
    $stmt->execute(array( ':p'=> $pwd,':uid' => $_POST["userId"]));

}
else{
echo("POST Data Not Set");
}
?>