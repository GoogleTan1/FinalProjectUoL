<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check Update Proof of Authenticity</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$organisationId = mysqli_real_escape_string($conn, $_POST["organisationId"]); //organisationId
$uploadedFile = basename($_FILES["fileToUpload"]["name"]); //uploaded file

$sqlOrg = "SELECT * FROM organisations WHERE id = '$organisationId' "; //Select organisation
$finalOrg = mysqli_query ($conn, $sqlOrg);
$displayOrg = mysqli_fetch_assoc($finalOrg);
$originalFile = '';


    	
    if ($uploadedFile == "")
    {
         
        header("Location:../updateProofOfAuthencity.php?id=2");
        
    }
    else
    {
      
        $target_dir = "../organisationProofOfAuth/";
        $target_file = $target_dir . $displayOrg['id'] . "_" . $uploadedFile;
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) 
        {
            // Allow certain file formats
            if($fileType != "pdf") 
            {
                header("Location:../updateProofOfAuthencity.php?id=4"); //File not uploaded, wrong format
                $uploadOk = 0;
            }
        }
        

        if ($uploadOk == 0) 
        {
            header("Location:../updateProofOfAuthencity.php?id=4"); //File not uploaded
            
        } 
        else //uploads file
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) //UPLOAD SUCCESS
            {
                unlink($target_dir . $originalFile);
                //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                $fileNameChange = $displayOrg['id'] . "_" . $uploadedFile;
                $sqlUpdateOrg = "UPDATE organisations SET organisationApproved = '1', organisationProofOfAuth = '$fileNameChange' WHERE id = '$organisationId'  "; // Update Organisation
	            $updateOrg = mysqli_query($conn,$sqlUpdateOrg);
        
        //echo $originalFile;
        header("Location:../updateProofOfAuthencity.php?id=3");
            } 
            else 
            {
                header("Location:../updateProofOfAuthencity.php?id=5"); //File not uploaded, error or above 1GB
            }
        
        }
        
        
  
    }
        
    
    
?>

<body>



</body>
</html>