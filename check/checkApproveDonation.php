<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Check Approve Donation</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$donationId = mysqli_real_escape_string($conn, $_POST["donationId"]); //donation Id
$campaignId = mysqli_real_escape_string($conn, $_POST["appealId"]); //campaignId
$amount = mysqli_real_escape_string($conn, $_POST["amount"]); //amount

 

 
//Updates and popup
$conn = mysqli_connect("localhost","root","","finalprojectdb");


$sqlUpdateDonation = "UPDATE donations SET approvedByOrg = '1' WHERE id = '$donationId' "; // Update donation to approve
$updateDonation = mysqli_query($conn,$sqlUpdateDonation);
    
//Update donation total amount
$sqlCampaign = "SELECT * FROM campaigns WHERE id = '$campaignId' ";
$finalCampaign = mysqli_query ($conn, $sqlCampaign);
$displayCampaign = mysqli_fetch_assoc($finalCampaign);        

$totalAmount = $displayCampaign['amountCollected'] + $amount;
    
$sqlUpdateCampaign = "UPDATE campaigns SET amountCollected = '$totalAmount' WHERE id = '$campaignId' "; // Update campaign with final amount
$updateCampaign = mysqli_query($conn,$sqlUpdateCampaign);
 
//CHECKS FOR NEW AMOUNT
$sqlCampaignNewAmt = "SELECT * FROM campaigns WHERE id = '$campaignId' ";
$finalCampaignNewAmt = mysqli_query ($conn, $sqlCampaignNewAmt);
$displayCampaignNewAmt = mysqli_fetch_assoc($finalCampaignNewAmt);     
    
    
if ($displayCampaignNewAmt['amountCollected'] >= $displayCampaignNewAmt['finalAmount'])
{
    $sqlUpdateCampaignEnd = "UPDATE campaigns SET stillRunning = '0' WHERE id = '$campaignId' "; // Update campaign ended when amount is over final amount
    $updateCampaignEnd = mysqli_query($conn,$sqlUpdateCampaignEnd);
}
        
echo 'amountCollected: ' . $displayCampaignNewAmt['amountCollected'];
echo 'finalAmount: ' . $displayCampaignNewAmt['finalAmount'];
    
header("Location:../campaignDetailsOrg.php?id=$campaignId&status=1"); 
?>

<body>
 
    



</body>
</html>