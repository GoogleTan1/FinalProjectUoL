<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check Update Password</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$oldPassword = mysqli_real_escape_string($conn, $_POST["oldPassword"]); //oldPassword
$newPassword = mysqli_real_escape_string($conn, $_POST["newPassword"]); //newPassword 
$retypePassword = mysqli_real_escape_string($conn, $_POST["retypePassword"]); //retypePassword
$accountId = mysqli_real_escape_string($conn, $_POST["accountId"]); //account Id


$sqlPassword = "SELECT * FROM accounts WHERE id = '$accountId' "; //Select password
$finalPassword = mysqli_query ($conn, $sqlPassword);
$displayPassword = mysqli_fetch_assoc($finalPassword); 
    

if ($displayPassword['password'] != $oldPassword)
{
    header("Location:../changePassword.php?id=4");
}
else if ($newPassword != $retypePassword)
{
    header("Location:../changePassword.php?id=3");
}
else
{
    $sqlUpdatePassword = "UPDATE accounts SET password = '$newPassword' WHERE id = '$accountId' "; // Update password
	    $updatePassword = mysqli_query($conn,$sqlUpdatePassword);
        
     
        header("Location:../changePassword.php?id=2");
}
    

        
        

 
    
?>

<body>



</body>
</html>