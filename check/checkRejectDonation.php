<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Check Reject Donation</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$donationId = mysqli_real_escape_string($conn, $_POST["donationId"]); //donation Id
$campaignId = mysqli_real_escape_string($conn, $_POST["appealId"]); //campaignId
$amount = mysqli_real_escape_string($conn, $_POST["amount"]); //amount

 

 
//Updates and popup
$conn = mysqli_connect("localhost","root","","finalprojectdb");


$sqlUpdateDonation = "UPDATE donations SET approvedByOrg = '2' WHERE id = '$donationId' "; // Update donation to rejected
$updateDonation = mysqli_query($conn,$sqlUpdateDonation);

    
header("Location:../campaignDetailsOrg.php?id=$campaignId&status=1"); 
?>

<body>
 
    



</body>
</html>