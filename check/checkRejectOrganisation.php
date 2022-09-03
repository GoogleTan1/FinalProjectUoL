<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Check reject organisation</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$organisationId = mysqli_real_escape_string($conn, $_POST["organisationId"]); //organisationId

 

 
//Updates and popup
$conn = mysqli_connect("localhost","root","","finalprojectdb");


        $sqlUpdateOrg = "UPDATE organisations SET organisationApproved = '3' WHERE id = '$organisationId' "; // Update Organisation to approve
	    $updateOrg = mysqli_query($conn,$sqlUpdateOrg);
        
     
        
        
 
?>

<body>
 <?php 
    
    $sqlShowOrgName = "SELECT * FROM organisations WHERE id = '$organisationId' ";
    $finalShowOrgName = mysqli_query ($conn, $sqlShowOrgName);
    $displayShowOrgName = mysqli_fetch_assoc($finalShowOrgName);
    
    ?>   
    
<script>
    alert("<?php echo $displayShowOrgName['organisationName'] ?> has been rejected");
    window.location.href='../pendingApprovals.php?id=1';
</script>


</body>
</html>