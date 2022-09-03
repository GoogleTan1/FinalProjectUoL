<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check search transaction</title>
</head>

<body>
<?php





$conn = mysqli_connect("localhost","root","","finalprojectdb");
    
 $transactionNo = mysqli_real_escape_string($conn, $_POST["transactionNo"]); //organisationId
$transactionKey = mysqli_real_escape_string($conn, $_POST["transactionKey"]); //transactionKey   
$sql = "SELECT * FROM donations WHERE id = '$transactionNo' and passwordKey = '$transactionKey' ";
$search_result = mysqli_query($conn,$sql); //connecting to table and return result
$datafound = mysqli_num_rows($search_result); //return result search number





	if ($datafound >= 1)
	{

	header("Location:../searchTransaction.php?id=$transactionNo&key=$transactionKey");
	}
	
else
{
	
	header("Location:../searchTransaction.php?id=search&status=wronginfo");
}
?>
</body>
</html>