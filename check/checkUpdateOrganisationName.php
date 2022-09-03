<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check Update Organisation Name</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$organisationId = mysqli_real_escape_string($conn, $_POST["organisationId"]); //organisationId
$organisationName = mysqli_real_escape_string($conn, $_POST["organisationName"]); //organisationName    
 
$sqlOrg = "SELECT * FROM organisations WHERE id = '$organisationId' "; //Select organisation
$finalOrg = mysqli_query ($conn, $sqlOrg);
$displayOrg = mysqli_fetch_assoc($finalOrg);


    	

        $sqlUpdateOrg = "UPDATE organisations SET organisationName = '$organisationName' WHERE id = '$organisationId' "; // Update Organisation
	    $updateOrg = mysqli_query($conn,$sqlUpdateOrg);
        
     
        header("Location:../updateOrganisationName.php?id=2");
        

 
    
?>

<body>



</body>
</html>