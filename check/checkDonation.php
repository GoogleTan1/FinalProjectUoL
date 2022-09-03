<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check Donation</title>
</head>
<?php 
date_default_timezone_set("Asia/Singapore");
$conn = mysqli_connect("localhost","root","","finalprojectdb");
$accountId = mysqli_real_escape_string($conn, $_POST["accountId"]); //accountId
$campaignId = mysqli_real_escape_string($conn, $_POST["campaignId"]); //campaignId
$orgId = mysqli_real_escape_string($conn, $_POST["orgId"]); //organisation id
$amountDonated = mysqli_real_escape_string($conn, $_POST["amount"]); //organisation id
$uploadedFile = basename($_FILES["fileToUpload"]["name"]); //uploaded file
    


$sqlCount = "SELECT COUNT(*) as totalCount FROM donations";
$finalCount = mysqli_query ($conn, $sqlCount);
$displayCount = mysqli_fetch_assoc($finalCount);
$donationCount = $displayCount['totalCount'] + 1;
    

if ($uploadedFile == "")
    {
         
        header("Location:../donateNow.php?id=$campaignId&statusId=1");
        
    }
    

if ($accountId != '') //If account is logged in
{
    //-----------------------------------------------------------------------------------------------------UPLOADING
$target_dir = "../donationProof/";
$target_file = $target_dir . $donationCount . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
  $uploadOk = 0;
  header("Location:../donateNow.php?id=$campaignId&statusId=2");
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  $uploadOk = 0;
  header("Location:../donateNow.php?id=$campaignId&statusId=1");
  
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header("Location:../donateNow.php?id=$campaignId&statusId=3");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. The count is " . $donationCount;
      //------------------------------------------------------------------------------------------------- SQL INSERTS
    $randomKey = rand(10000000,99999999); //generate a key
    $imageLink = $donationCount . basename($_FILES["fileToUpload"]["name"]);
    $sqlInsertDonation = "INSERT INTO donations (accountId, campaignId, orgId, amountDonated, passwordKey,transactionScreenshot) VALUES ('$accountId','$campaignId','$orgId','$amountDonated','$randomKey','$imageLink')"; // Insert into donation table
    $insertDonation = mysqli_query($conn,$sqlInsertDonation); 
    
    $sqlGetLastId = "SELECT * FROM donations ORDER BY id DESC LIMIT 1";
    $finalGetLastId = mysqli_query ($conn, $sqlGetLastId);
    $displayGetLastId= mysqli_fetch_assoc($finalGetLastId); 
    $transactionId = $displayGetLastId['id'];
    header("Location:../transactionComplete.php?id=$transactionId&key=$randomKey");
  } else {
    header("Location:../donateNow.php?id=$campaignId&statusId=3");
  }
}
    
    
    
    
}
else //Account not logged in, anonymous donation
{
//-----------------------------------------------------------------------------------------------------UPLOADING
$target_dir = "../donationProof/";
$target_file = $target_dir . $donationCount . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}



// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
  
  header("Location:../donateNow.php?id=$campaignId&statusId=2");
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  
  header("Location:../donateNow.php?id=$campaignId&statusId=1");
    $uploadOk = 0;
  
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header("Location:../donateNow.php?id=$campaignId&statusId=3");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. The count is " . $donationCount;
      //------------------------------------------------------------------------------------------------- SQL INSERTS
    $randomKey = rand(10000000,99999999); //generate a key
    $imageLink = $donationCount . basename($_FILES["fileToUpload"]["name"]);
    $sqlInsertDonation = "INSERT INTO donations (campaignId, orgId, amountDonated, passwordKey, transactionScreenshot) VALUES ('$campaignId','$orgId','$amountDonated','$randomKey','$imageLink')"; // Insert into donation table
    $insertDonation = mysqli_query($conn,$sqlInsertDonation); 
    
    $sqlGetLastId = "SELECT * FROM donations ORDER BY id DESC LIMIT 1";
    $finalGetLastId = mysqli_query ($conn, $sqlGetLastId);
    $displayGetLastId= mysqli_fetch_assoc($finalGetLastId); 
    $transactionId = $displayGetLastId['id'];
    header("Location:../transactionComplete.php?id=$transactionId&key=$randomKey");
  } else {
    header("Location:../donateNow.php?id=$campaignId&statusId=3");
  }
}
    

  
}




    
    
?>

<body>



</body>
</html>