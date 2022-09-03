<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check stop running campaign</title>
</head>
<?php 

$conn = mysqli_connect("localhost","root","","finalprojectdb");
$campaignId = mysqli_real_escape_string($conn, $_POST["campaignId"]); //campaignId
$campaignName = mysqli_real_escape_string($conn, $_POST["campaignName"]); //campaignName
 



    	

        $sqlUpdateOrg = "UPDATE campaigns SET stillRunning = '0' WHERE id = '$campaignId' "; // Update Campaign to stop running
	    $updateOrg = mysqli_query($conn,$sqlUpdateOrg);
    ?>
    <script>
    alert("'<?php echo $campaignName ?>' campaign has been stopped");
    window.location.href='../individualCampaignTable.php?id=1';
</script>
    <?php

        

 
    
?>

<body>



</body>
</html>