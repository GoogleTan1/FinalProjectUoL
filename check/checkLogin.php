<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check login</title>
</head>

<body>
<?php

$u = $_POST['username'];
$p = $_POST['password'];



$conn = mysqli_connect("localhost","root","","finalprojectdb");
$sql = "SELECT * FROM accounts WHERE username = '$u' and password = '$p' ";
$search_result = mysqli_query($conn,$sql); //connecting to table and return result
$userfound = mysqli_num_rows($search_result); //return result search number





	if ($userfound >= 1)
	{
	session_start();
	$_SESSION['MM_Username'] = $u;
	
	header("Location:../index.php");
	}
	
else
{
	
	header("Location:../logIn.php?id=1");
}
?>
</body>
</html>