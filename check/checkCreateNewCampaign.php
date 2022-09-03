<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check Create New Campaign</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$organisationId = mysqli_real_escape_string($conn, $_POST["organisationId"]); //organisationId
$campaignName = mysqli_real_escape_string($conn, $_POST["campaignName"]); //campaignName   
$finalAmount = mysqli_real_escape_string($conn, $_POST["finalAmount"]); //required amount
$campaignDescription = mysqli_real_escape_string($conn, $_POST["campaignDescription"]); //campaignName
$bankAccountType = mysqli_real_escape_string($conn, $_POST["bankAccountType"]); //bankAccountType
$bankAccountNo = mysqli_real_escape_string($conn, $_POST["bankAccountNo"]); //bankAccountNo
$organisationName = mysqli_real_escape_string($conn, $_POST["organisationName"]); //organisationName
$organisationOwner = mysqli_real_escape_string($conn, $_POST["organisationOwner"]); //organisationOwner
$uploadedFile = basename($_FILES["fileToUpload"]["name"]); //uploaded file

    
$todayDay = date("d");
$todayMonth = date("m");
$todayYear = date("Y");

$sqlOrg = "SELECT * FROM organisations WHERE id = '$organisationId' "; //Select organisation
$finalOrg = mysqli_query ($conn, $sqlOrg);
$displayOrg = mysqli_fetch_assoc($finalOrg);


 //-----------------------------IF NO IMAGE IS UPLOADED   	
    if ($uploadedFile == "")
    {
         $sqlInsertCampaign = "INSERT INTO campaigns (campaignName, campaignDetails, finalAmount, bankAccountNo, bankType, campaignOrganisation, campaignDay, campaignMonth, campaignYear) VALUES ('$campaignName','$campaignDescription','$finalAmount','$bankAccountNo','$bankAccountType','$organisationId','$todayDay','$todayMonth','$todayYear')"; // SQL LINE
         $insertCampaign = mysqli_query($conn,$sqlInsertCampaign); //Insert Campaign
         echo $sqlInsertCampaign;
         header("Location:../createNewCampaign.php?id=1");
        
        
        
    }
    else
    {
      
        $sqlCountCampaigns = "SELECT * FROM campaigns"; //checks for any campaigns at the moment
        $search_result_campaigns = mysqli_query($conn,$sqlCountCampaigns);
        $campaignsFound = mysqli_num_rows($search_result_campaigns); //return result search number
        
  //-----------------------------IF THERE IS NO CAMPAIGN AT THE MOMENT     
        if ($campaignsFound == 0)  //No there is no campaigns at the moment
	    {
	        $target_dir = "../organisationCampaignImg/";
            $target_file = $target_dir . $organisationId . "_FIRST_CAMPAIGN_EVER_" . $uploadedFile;
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) 
            {
                // Allow certain file formats
                if($fileType != "png" && $fileType != "jpg" && $fileType != "jpeg") 
                {
                    $uploadOk = 0;
                }
            }
            
    
            if ($uploadOk == 0) 
            {
                header("Location:../createNewCampaign.php?id=2"); //File Format Wrong   
            } 
            else //uploads file
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) //UPLOAD SUCCESS
                {
                    $fileNameChange = $organisationId . "_FIRST_CAMPAIGN_EVER_" . $uploadedFile;
                    $sqlInsertCampaign = "INSERT INTO campaigns (campaignName, campaignDetails, finalAmount, bankAccountNo, bankType, campaignOrganisation, campaignImage, campaignDay, campaignMonth, campaignYear) VALUES ('$campaignName','$campaignDescription','$finalAmount','$bankAccountNo','$bankAccountType','$organisationId','$fileNameChange','$todayDay','$todayMonth','$todayYear')"; // SQL LINE
                    $insertCampaign = mysqli_query($conn,$sqlInsertCampaign); //Insert Campaign
                    echo $sqlInsertCampaign;
                    header("Location:../createNewCampaign.php?id=1");
                } 
                else 
                {
                    header("Location:../createNewCampaign.php?id=3"); //File not uploaded, error or above 1GB
                }
            
            }
	    }
        
    //-----------------------------IF THERE IS ALREADY EXISTING CAMPAIGNS  
        else
        {
            $sqlLatestCampaign = "SELECT * FROM campaigns ORDER BY id DESC LIMIT 1"; //Select latest campaign
            $finalLatestCampaign= mysqli_query ($conn, $sqlLatestCampaign);
            $displayLatestCampaign = mysqli_fetch_assoc($finalLatestCampaign);
            $latestCampaignAddOne = $displayLatestCampaign['id'] + 1;
            
            $target_dir = "../organisationCampaignImg/";
            $target_file = $target_dir . $organisationId . "OrgId_" . $latestCampaignAddOne ."_AddOne_" . $uploadedFile;
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) 
            {
                // Allow certain file formats
                if($fileType != "png" && $fileType != "jpg" && $fileType != "jpeg") 
                {
                    $uploadOk = 0;
                }
            }
            
    
            if ($uploadOk == 0) 
            {
                header("Location:../createNewCampaign.php?id=2"); //File Format Wrong   
            } 
            else //uploads file
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) //UPLOAD SUCCESS
                {
                    $fileNameChange = $organisationId . "OrgId_" . $latestCampaignAddOne . "_AddOne_" . $uploadedFile;
                    $sqlInsertCampaign = "INSERT INTO campaigns (campaignName, campaignDetails, finalAmount, bankAccountNo, bankType, campaignOrganisation, campaignImage, campaignDay, campaignMonth, campaignYear) VALUES ('$campaignName','$campaignDescription','$finalAmount','$bankAccountNo','$bankAccountType','$organisationId','$fileNameChange','$todayDay','$todayMonth','$todayYear')"; // SQL LINE
                    $insertCampaign = mysqli_query($conn,$sqlInsertCampaign); //Insert Campaign
                    echo $sqlInsertCampaign;
                    header("Location:../createNewCampaign.php?id=1");
                } 
                else 
                {
                    header("Location:../createNewCampaign.php?id=3"); //File not uploaded, error or above 1GB
                }
            
            }
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
  
    }
        
    
    
?>

<body>



</body>
</html>