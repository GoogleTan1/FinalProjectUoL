<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Create New Campaign</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

   
      
  </head>

<body>

   

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <?php
                    include "loginBar.php"
                ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                     <?php
                    include "nav.php"
                ?>
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
<!-- Check if logged in START -->     
 <?php
                        
if ($_SESSION['MM_Username'] == '')
{
	header("Location:login.php?id=3");
}
if(isset($_GET['id']))
{
    $id = $_GET['id'];
		
}
//Check if logged in END
              
$uname_i = $_SESSION['MM_Username'];//SETS $uname_i VARIABLE TO LOGGED IN USERNAME
$conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
              
//PROFILE DISPLAY
$sqlMain = "SELECT * FROM accounts INNER JOIN accounts_type ON accounts.account_type = accounts_type.id WHERE username = '$uname_i' "; //SQL CODE, SELECT EVERYTHING FROM ACCOUNTS AND ACCOUNTS_TYPE TABLE WHERE USERNAME IS LOGGED IN USERNAME
$finalMain = mysqli_query ($conn, $sqlMain);//TABLE CONNECTION
$displayMain = mysqli_fetch_assoc($finalMain);//DISPLAY RESULTS

//ORGANISATION DISPLAY
$organisationOwner = $display['id'];//SET $organisationOwner VARIABLE TO 'id' FROM PROFILE DISPLAY SQL           
$sqlOrg = "SELECT * FROM organisations WHERE organisationOwner = '$organisationOwner' "; //SQL CODE, SELECT EVERYTHING FROM ORGANISATIONS TABLE WHERE ORGANISAITON OWNER IS LOGGED IN ID
$finalOrg = mysqli_query ($conn, $sqlOrg);//TABLE CONNECTION
$displayOrg = mysqli_fetch_assoc($finalOrg);//DISPLAY RESULTS
              
?>
<!-- Check if logged in END -->
            
          <h2>Create New Campaign <a href="profile.php">(Back)</a></h2><br>
              
              <?php 
    
            if ($displayMain['id'] != '1')//IF LOGGED IN IS NOT ORGANISATION ACCOUNT
            {
                header("Location:login.php?id=3");//RETURN TO LOGIN SCREEN
            }
              ?>
              
              
        </div>
      </div>
    </div>
  </section>

  <section>
<center>
      <!-- ERROR display -->                     
        <?php if(isset($_GET['status']))
	{
		$id = $id = $_GET['status'];
		
		if ($_GET['id'] == '1') //CAMPAIGN CREATED
		{
			echo '<b style="color: Green;">Campaign Creation Successful</b>';
		}
		else if ($_GET['id'] == '2')//UPLOADED FILE FORMAT IS WRONG
		{
			echo '<b style="color: red;">Uploaded file format is wrong, it MUST be in PNG, JPG or JPEG</b>';
		}
        else if ($_GET['id'] == '3')//UPLOADED FILE EXCEED MAX SIZE
		{
			echo '<b style="color: red;">Uploaded file size must not exceed 1GB</b>';
		}
        else if ($_GET['id'] == 'mainPage')//RETURN TO MAIN PAGE
		{
			echo '<br>';
		}
        
	}
    
     if(isset($_GET['id']))
	{
		$id = $id = $_GET['id'];
		
		if ($_GET['id'] == '1') //CAMPAIGN CREATED
		{
			echo '<b style="color: Green;">Campaign Creation Successful</b>';
		}
		else if ($_GET['id'] == '2')//UPLOADED FILE FORMAT IS WRONG
		{
			echo '<b style="color: red;">Uploaded file format is wrong, it MUST be in PNG, JPG or JPEG</b>';
		}
        else if ($_GET['id'] == '3')//UPLOADED FILE EXCEED MAX SIZE
		{
			echo '<b style="color: red;">Uploaded file size must not exceed 1GB</b>';
		}
        else if ($_GET['id'] == 'mainPage')//RETURN TO MAIN PAGE
		{
			echo '<br>';
		}
        
	}
		?></center>
                            
                            <form action="check/checkCreateNewCampaign.php" method="post" class="updateForm" enctype="multipart/form-data">
                                
                           <center>
                               <h4><b>Legend</b></h4><br>
                            
                               <b>Campaign Title</b> - The main title of your campaign.<br>
                               <b>Required Amount</b> - The amount required to be fulfilled by donators<br>
                               <b>Campaign Description</b> - The description of your campaign, put as much detail as possible.<br>
                               <b>Bank Account Type</b> - The type of bank account donators will transfer to (eg. DBS, POSB, BOC etc).<br>
                               <b>Bank Account Number</b> - The bank account number donators will transfer to (eg. 039-47604-5)<br>
                               <b>Campaign Image</b> - The image shown to public (PNG, JPG or JPEG ONLY and LESS THAN 1GB)<br>
                               <hr>
                               
                               
                            <b>Campaign Title: </b> <br>
                            <input name="campaignName" type="text" id="campaignName" required="required" style="min-width:50%;"><br><br>
                               
                            <b>Required Amount: </b> <br>
                            <input name="finalAmount" type="number" id="finalAmount" required="required" style="min-width:50%;"><br><br>
                             
                            <b>Campaign Description: </b> <br>
                            <textarea id="campaignDescription" name="campaignDescription"  style="min-width:50%; min-height: 100px;" required="required"></textarea>   <br><br>
                               
                            <b>Bank Account Type: </b> <br>
                            <input name="bankAccountType" type="text" id="bankAccountType" required="required" style="min-width:50%;"><br><br>   
                               
                            <b>Bank Account Number: </b> <br>
                            <input name="bankAccountNo" type="text" id="bankAccountNo" required="required" style="min-width:50%;"><br><br>  
                            
                            <input name="organisationName" type="text" id="organisationName"  required="required" style="min-width:50%;" hidden=true value="<?php echo $displayOrg['organisationName'] ?>">
                             
                            <input name="organisationOwner" type="text" id="organisationOwner"  required="required" style="min-width:50%;" hidden=true value="<?php echo $displayMain['username'] ?>">
                              
                            <b>Campaign Image: </b> <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                               
                            <input type="checkbox" id="agreeCorrect" name="agreeCorrect" value="agreed" onclick="agreeCorrectFunction()"> I agree that the information is correct and is inline with the <a href="../tos.php" target="_blank">Terms of Service</a>
                                
                            <input name="organisationId" type="text" id="organisationId" hidden=true style="width: 350px;" value="<?php echo $displayOrg['id'] ?>"> <!-- Organisation ID hidden to post -->
                                <br><br>    
                                <hr>
                            <input type="submit" id="submit" name="submit" value="Create Campaign"  disabled=true>
                            </center>
                               </form><br><br><br>      
  </section>
 

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    
    
     <style>
        .updateForm {
            
           margin: auto;
  width: 80%;
  border: 3px solid black;
  padding: 10px;
        }    
         
         
        
    </style>
    
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
        
        
        
        
    </script>
    
    <script type="text/javascript">
   
    function agreeCorrectFunction() {
        var checkBox = document.getElementById("agreeCorrect");
        if (checkBox.checked == true){
            document.getElementById("submit").disabled = false;
            
        } else {
           document.getElementById("submit").disabled = true;
        }
    }
    
    
    
    
</script>
</body>


</html>
