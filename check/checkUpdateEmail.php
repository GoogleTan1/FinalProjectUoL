<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check Update Email</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$newEmail = mysqli_real_escape_string($conn, $_POST["newEmail"]); //newEmail
$accountId = mysqli_real_escape_string($conn, $_POST["accountId"]); //account Id


$sqlEmail = "SELECT * FROM accounts WHERE id = '$accountId' "; //Select password
$finalEmail = mysqli_query ($conn, $sqlEmail);
$displayEmail = mysqli_fetch_assoc($finalEmail); 
    


    $sqlUpdateEmail= "UPDATE accounts SET email_address = '$newEmail' WHERE id = '$accountId' "; // Update email
	    $updateEmail = mysqli_query($conn,$sqlUpdateEmail);
        
     
        header("Location:../changeEmail.php?id=2");

    

        
        

 
    
?>

<body>



</body>
</html>