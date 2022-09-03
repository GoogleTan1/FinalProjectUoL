<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check Register</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$username = mysqli_real_escape_string($conn, $_POST["username"]); //username
$password = mysqli_real_escape_string($conn, $_POST["password"]); //password
$email = mysqli_real_escape_string($conn, $_POST["email"]); //email

$regAsOrg = mysqli_real_escape_string($conn, $_POST["regAsOrg"]); //organisationCheckBox checked
$organisationName = mysqli_real_escape_string($conn, $_POST["organisation_name"]); //organisation name  

 
//checks for duplicated username
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$sqlUsername = "SELECT * FROM accounts WHERE username = '$username'"; //checks for duplicate username
$search_result_username = mysqli_query($conn,$sqlUsername);
$userfound = mysqli_num_rows($search_result_username); //return result search number
    
$sqlEmail = "SELECT * FROM accounts WHERE email_address = '$email'"; //checks for duplicate username
$search_result_email = mysqli_query($conn,$sqlEmail);
$emailFound = mysqli_num_rows($search_result_email); //return result search number   
   
if ($emailFound >= 1 && $userfound >=1)  //yes, there is duplicate username AND email. Revert back to sign up
	{
	header("Location:../register.php?id=3");
	}
else if ($emailFound >= 1) //yes, there is duplicate email. Revert back to sign up
    {
    header("Location:../register.php?id=2");
    }
else if ($userfound >= 1) //yes, there is duplicate username. Revert back to sign up
    {
    header("Location:../register.php?id=1");
    } 
    
else  //no duplicates, account creation continues
{	
    if ($regAsOrg == "registerAsOrganisation")
    {
        $sqlAddAccount = "INSERT INTO accounts (username, email_address, password, account_type) VALUES ('$username','$email', '$password','1')"; // Add to account
	    $insertAccount = mysqli_query($conn,$sqlAddAccount);
        
        $sqlGetAccountId = "SELECT * FROM accounts WHERE username = '$username' "; //gets the newly created account ID
        $final = mysqli_query ($conn, $sqlGetAccountId);
        $display = mysqli_fetch_assoc($final);
        $accountId = $display['id'];
        
        $sqlAddOrganisation = "INSERT INTO organisations (organisationName, organisationOwner) VALUES ('$organisationName','$accountId')"; // Add to Organisation
	    $insertOrganisation = mysqli_query($conn,$sqlAddOrganisation);
        
        header("Location:../logIn.php?id=2");
        
    }
    else
    {
        $sqlAddAccount = "INSERT INTO accounts (username, email_address, password) VALUES ('$username','$email', '$password')"; // Add to account
	    $insertAccount = mysqli_query($conn,$sqlAddAccount); 
  
   header("Location:../logIn.php?id=2");
    }
        
}    
    
?>

<body>



</body>
</html>