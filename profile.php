<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - My Profile</title>

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
              
//ACCOUNT TABLE DISPLAY
$sqlAccount = "SELECT * FROM accounts WHERE username = '$uname_i'";//SELECT EVERYTHING FROM ACCOUNTS TABLE WHERE USERNAME IS LOGGED IN USERNAME
$finalAccount = mysqli_query ($conn, $sqlAccount);//TABLE CONNECTION
$displayAccount = mysqli_fetch_assoc($finalAccount);//DISPLAY RESULTS
$accountId = $displayAccount['id'];//SETS $accountId VARIABLE TO LOGGED IN ID
              
//SUM OF AMOUNT DONATED 
$sqlDonated = "SELECT SUM(amountDonated) AS amountDonated FROM donations WHERE accountId = '$accountId' && approvedByOrg = '1' "; //SELECT THE TOTAL SUM OF amountDonated IN DONATIONS TABLE WHERE ACCOUNT ID IS LOGGED IN ID AND DONATION IS APPROVED
$finalDonated = mysqli_query ($conn, $sqlDonated);//TABLE CONNECTION
$displayDonated = mysqli_fetch_assoc($finalDonated);//DISPLAY RESULTS

//UNIQUE ORGANISATION DONATED
$sqlUniqueOrg = "SELECT COUNT(DISTINCT campaignId) AS uniqueOrgDonated FROM donations WHERE accountId = '$accountId' && approvedByOrg = '1'";//SELECT THE TOTAL COLUMN COUNT OF UNIQUE CAMPAIGNS THAT THE ACCOUNT DONATED TO
$finalUniqueOrg = mysqli_query ($conn, $sqlUniqueOrg);//TABLE CONNECTION
$displayUniqueOrg = mysqli_fetch_assoc($finalUniqueOrg);//DISPLAY RESULTS
              
//TOTAL COUNT OF APPROVED TOTAL DONATIONS
$sqlDonationCount = "SELECT COUNT(*) AS donationCount FROM donations WHERE accountId = '$accountId' && approvedByOrg = '1' ";//SELECT THE TOTAL COLUMN COUNT OF DONATION THE ACCOUNT MADE
$finalDonationCount = mysqli_query ($conn, $sqlDonationCount);//TABLE CONNECTION
$displayDonationCount = mysqli_fetch_assoc($finalDonationCount);//DISPLAY RESULTS
              
              
//PROFILE DISPLAY
$sqlMain = "SELECT * FROM accounts INNER JOIN accounts_type ON accounts.account_type = accounts_type.id WHERE username = '$uname_i' ";//SELECT EVERYTHING FROM ACCOUNTS AND ACCOUNTS TYPE TABLE WHERE USERNAME IS LOGGED IN USERNAME
$finalMain = mysqli_query ($conn, $sqlMain);//TABLE CONNECTION
$displayMain = mysqli_fetch_assoc($finalMain);//DISPLAY RESULTS
              
//TOTAL COUNT OF RUNNING CAMPAIGNS
$sqlCountCampaignAdmin = "SELECT COUNT(*) AS totalCampaign FROM campaigns WHERE stillRunning = '1'"; //Select COUNT of all running campaigns 
$finalCountCampaignAdmin = mysqli_query ($conn, $sqlCountCampaignAdmin);//TABLE CONNECTION
$displayCountCampaignAdmin = mysqli_fetch_assoc($finalCountCampaignAdmin);//DISPLAY RESULT

if ($displayMain['id'] == '1')//ORGANISATION ACCOUNT
{
    //ORGANISATION DISPLAY
$organisationOwner = $display['id'];
$sqlOrg = "SELECT * FROM organisations WHERE organisationOwner = '$organisationOwner' "; //Select organisation
$finalOrg = mysqli_query ($conn, $sqlOrg);//TABLE CONNECTION
$displayOrg = mysqli_fetch_assoc($finalOrg);//DISPLAY RESULT
$organisationId = $displayOrg['id'];//SET $organisationId VARIABLE TO ORGANISATION ID


              
$sqlCountCampaign = "SELECT COUNT(*) AS totalCampaign FROM campaigns WHERE campaignOrganisation = '$organisationId' AND stillRunning = '1'"; //Select COUNT of campaigns by this account
$finalCountCampaign = mysqli_query ($conn, $sqlCountCampaign);//TABLE CONNECTION
$displayCountCampaign = mysqli_fetch_assoc($finalCountCampaign);//DISPLAY RESULT
              
$sqlCountCash = "SELECT SUM(amountCollected) AS amountCollected FROM campaigns WHERE campaignOrganisation = '$organisationId' "; //Select SUM of CASH by this account
$finalCountCash = mysqli_query ($conn, $sqlCountCash);//TABLE CONNECTION
$displayCountCash = mysqli_fetch_assoc($finalCountCash);//DISPLAY RESSULT
              
$sqlCountCampaignEnded = "SELECT COUNT(*) AS totalCampaignEnd FROM campaigns WHERE campaignOrganisation = '$organisationId' AND stillRunning = '0' "; //Select COUNT of campaigns by this account THAT ENDED
$finalCountCampaignEnded = mysqli_query ($conn, $sqlCountCampaignEnded);//TABLE CONNECTION
$displayCountCampaignEnded = mysqli_fetch_assoc($finalCountCampaignEnded);//DISPLAY RESULT
  
  }   
//ADMIN DISPLAY           
$sqlPendingApprovals = "SELECT COUNT(*) as pendingTotal FROM organisations WHERE organisationApproved = '1' "; //Select COUNT of PEDNING approvals
$finalPendingApprovals = mysqli_query ($conn, $sqlPendingApprovals);//TABLE CONNECTION
$displayPendingApprovals = mysqli_fetch_assoc($finalPendingApprovals);//DISPLAY RESULT
              
$sqlApprovedOrg = "SELECT COUNT(*) as approvedTotal FROM organisations WHERE organisationApproved = '2' "; //Select COUNT of APPROVED organisations
$finalApprovedOrg = mysqli_query ($conn, $sqlApprovedOrg);//TABLE CONNECTION
$displayApprovedOrg = mysqli_fetch_assoc($finalApprovedOrg);//DISPLAY RESULT
             
?>

            
          <h2><?php 
              if ($displayMain['id'] == '1') //
              {
                  echo $display['username'] . '<br>';
              }
              else
              {
                  echo $display['username'] . '<br>';
              }
              
              if ($displayMain['id'] == '1')
              {
                  ?>
              (<?php echo $displayOrg['organisationName']?>)</h2>
              <?php
              }
              ?>
              
              
        </div>
      </div>
    </div>
  </section>

  <section>
                       
        
      <center>
  <div class="column"> <!-- MEMBER OF PUBLIC ACCOUNT -->
      <h2>Account Details </h2>
      <br>
      <b>Account Type:</b><br> <?php echo $displayMain['account_type'] ?><br><br>
      <b>Username:<br></b> <?php echo $displayMain['username'] ?><br><br>
      <b>Email:<br> </b><?php echo $displayMain['email_address'] ?>
      <br><br>
      <center>
      <div class="main-button-red" style="">
        <a href="changeEmail.php">Change Email</a>
        </div><br>
      <div class="main-button-red" style="">
        <a href="changePassword.php">Change Password</a>
        </div>
      </center>
  </div>     
          
          <?php 
          if ($displayMain['id'] == '1')
          { ?>
              <div class="column"> <!-- ORGANISATION ACCOUNT -->
  <h2>Organisation Details</h2>
      <br>
      <b>Account Approval Status:<br> </b>
                  
        <?php
        if ($displayOrg['organisationApproved'] == '0')
        {
            echo 'Unapproved, update proof of authencity';
        }
           else if ($displayOrg['organisationApproved'] == '1')
           {
               echo 'Pending Approval';
           }
           else if ($displayOrg['organisationApproved'] == '2')
           {
               echo 'Approved';
           }
              else
              { ?>
                  Rejected. Click <a href="reasonWhyRejected.php">HERE</a> to view why.
              <?php }
        ?>
                  <br><br>
      <b>Proof Of Authencity:</b><br> 
                  
                  <?php 
                  if ($displayOrg['organisationProofOfAuth'] == "")
                  {
                      echo 'No Proof of Authencity uploaded';
                  }
              else
              {
                  ?>
                  <b><a href="../organisationProofOfAuth/<?php echo $displayOrg['organisationProofOfAuth'] ?>" target="_blank">View Uploaded Proof of Authencity</a></b> 
                  <?php
              }
                  ?>
                  <br><br>
                  
                  
      <br><br><br>
      <center>
      <div class="main-button-red" style="">
        <a href="updateOrganisationName.php?id=mainPage">Update Organisation Name</a>
        </div><br>
          <div class="main-button-red" style="">
        <a href="updateProofOfAuthencity.php?id=mainPage">Update Proof Of Authencity</a>
        </div><br>
      
      </center>        
  </div>
          <div class="column"> <!-- ORGANISATION ACCOUNT CAMPAIGN-->
  <h2>My Campaigns</h2>
      <br>
      <b>Total Running Campaigns:<br> </b> <?php echo $displayCountCampaign['totalCampaign'] ?><br><br>
      <b>Total Amount Collected:</b><br> $<?php echo $displayCountCash['amountCollected'] ?> <br><br>
      <b>Campaigns Ended :<br></b> <?php echo $displayCountCampaignEnded['totalCampaignEnd'] ?> <br><br>
      <center>
      <div class="main-button-red" style="">
        <a href="individualCampaignTable.php">View All Campaigns</a>
        </div><br>
          <?php 
          if ($displayOrg['organisationApproved'] == '2')
          {
              ?>
          <div class="main-button-red" style="">
        <a href="createNewCampaign.php?id=mainPage">Create New Campaign</a>
        </div><br>
          <?php 
          }
          else
          { ?>
               <div class="main-button-gray" style="">
        <a>Campaign Creation Disabled</a>
        </div><br>
          <?php }
              ?>
          
      
      </center>        
  </div>
          
          
   <?php  }
      else if($displayMain['id'] == "0")
      {?>
          <div class="column">
  <h2>Donations Details</h2> <!-- MEMBER OF PUBLIC ACCOUNT -->
      <br>
      <b>Total Amount of Donations:</b><br> $<?php echo $displayDonated['amountDonated'] ?> <br><br>
      <b>Total Organisations Donated To :<br></b> <?php echo $displayUniqueOrg['uniqueOrgDonated'] ?> <br><br>
      <b>Total Donations Made:<br> </b><?php echo $displayDonationCount['donationCount'] ?> <br><br>
      <center>
      <div class="main-button-red" style="">
        <a href="individualDonationTable.php">Donations History</a>
        </div><br>
      
      </center>        
  </div>
   <?php  }
          ?>
          
  
          <?php 
          
    if ($displayMain['id'] == '2') 
    {
        ?>
          <div class="column">
  <h2>Admin Control Panel</h2> <!-- ADMIN ACCOUNT -->
      <br>
      <b>Approved Organisations:</b><br> <?php echo $displayApprovedOrg['approvedTotal'] ?> <br><br>
      <b>Pending Approval Organisations:<br></b> <?php echo $displayPendingApprovals['pendingTotal']; ?> <br><br>
      <b>Total Running Campaigns:<br> </b><?php echo $displayCountCampaignAdmin['totalCampaign'] ?> <br><br>
      <center>
      <div class="main-button-red" style="">
        <a href="allOrganisationsTable.php">View All Organisations</a>
        </div><br>
          <div class="main-button-red" style="">
        <a href="pendingApprovals.php"> <?php echo $displayPendingApprovals['pendingTotal']; ?> Pending Approvals</a>
        </div><br>
      
      </center>        
  </div>
        <?php
    }
?>
  
  </center>             
           
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
        .column {
            vertical-align: top;
            display: inline-block;
            width: 400px;
            height: 420px;
            border: 3px solid black;
            margin: 10px;
            text-align:left;
            padding-left: 10px;
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
</body>


</html>
