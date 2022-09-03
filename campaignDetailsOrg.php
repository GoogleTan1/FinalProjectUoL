<!DOCTYPE html>


<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Campaign Details</title>

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
  <header class="header-area header-sticky" style="background-color: grey;">
      <div class="container" >
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

  <section class="table-page">
   
<!-- Check if logged in START -->     
 <?php
                        
if ($_SESSION['MM_Username'] == '')
{
	header("Location:login.php?id=3");
}

$id = $_GET['id'];
//Check if logged in END		


$uname_i = $_SESSION['MM_Username'];//SETS VARIABLE $uname_i TO LOGGED IN USERNAME
$conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
              
//PROFILE DISPLAY
$sqlMain = "SELECT * FROM accounts WHERE username = '$uname_i' ";//SQL CODE, SELECT EVERYTHING FROM ACCOUNT WHERE THE USERNAME IS LOGGED IN USERNAME
$finalMain = mysqli_query ($conn, $sqlMain);//TABLE CONNECTION
$displayMain = mysqli_fetch_assoc($finalMain);//DISPLAY RESULTS
           
              
//Campaign DISPLAY
$sqlCampaign = "SELECT * FROM campaigns WHERE id = $id";//SQL CODE, SELECT EVERYTHING FROM CAMPAIGN TABLE WHERE id IS URL ID
$finalCampaign = mysqli_query ($conn, $sqlCampaign); //TABLE CONNECTION
$displayCampaign = mysqli_fetch_assoc($finalCampaign);//DISPLAY RESULTS
              
//Organisation DISPLAY
$organisationOwner = $displayMain['id']; //SETS $organisationOwner VARIABLE TO 'id' FROM PROFILE DISPLAY SQL
$sqlOrg = "SELECT * FROM organisations WHERE organisationOwner = $organisationOwner";//SELECT ALL FROM ORGANISATION TABLE WHERE ORGANISATION OWNER IS LOGGED IN ORGANISATION
$finalOrg = mysqli_query ($conn, $sqlOrg); //TABLE CONNECTION
$displayOrg = mysqli_fetch_assoc($finalOrg); //DISPLAY RESULTS
              
//Donation PENDING
$campaignId = $displayCampaign['id']; //SETS $campaignId VARIABLE TO 'id' FROM ORGANISATION DISPLAY SQL
$sqlDonation = "SELECT * FROM donations WHERE campaignId = '$campaignId' && approvedByOrg = 0"; //SQL CODE, SELECT EVERYTHING FROM DONATIONS TABLE WHERE THE CAMPAIGN ID IS $campaignId VARIABLE & CAMPAIGN IS PENDING APPROVAL
$finalDonation = mysqli_query ($conn, $sqlDonation); //TABLE CONNECTION

//Donation APPROVED
$sqlDonationApproved = "SELECT * FROM donations WHERE campaignId = '$campaignId' && approvedByOrg = 1"; //SQL CODE, SELECT EVERYTRHING FROM DONATION TABLE WHERE CAMPAIGN ID s $campaignId VARIABLE AND CAMPAIGN IS APPROVED
$finalDonationApproved = mysqli_query ($conn, $sqlDonationApproved);//TABLE CONNECTION
              
              
//Donation REJECTED
$sqlDonationRejected = "SELECT * FROM donations WHERE campaignId = '$campaignId' && approvedByOrg = 2"; //SQL CODE, SELECT EVERYTRHING FROM DONATION TABLE WHERE CAMPAIGN ID s $campaignId VARIABLE AND CAMPAIGN IS REJECTED
$finalDonationRejected = mysqli_query ($conn, $sqlDonationRejected);//TABLE CONNECTION  
              
//Organisation CHECKS   
$organisationOwnerCheck = $displayOrg['id'];//SETS $organisationOwnerCheck VARIABLE to 'id' FROM ORGANISATION DISPLAY SQL
$sql = "SELECT * FROM campaigns WHERE id = '$campaignId' and campaignOrganisation = '$organisationOwnerCheck' "; //SQL CODE, SELECT EVERYTHING FROM CAMPAIGNS TABLE WHERE 'id' IS $campaignId VARIABLE & campaign organisation IS $organisationOwnerCheck SQL
$search_result = mysqli_query($conn,$sql); //TABLE CONNECTION
$datafound = mysqli_num_rows($search_result); //RETURN RESULT SEARCH NUMBER


if ($displayMain['account_type'] != '1') //CHECKS IF ORGANISATION, IF NOT RETURN TO LOGIN
{
    header("Location:login.php?id=3");
}
              
if ($datafound < 1)//CHECKS IF APPEAL BELONGS TO OWNER
{
    header("Location:login.php?id=3");
}
              
?>
<!-- Check if logged in END -->
      

            
          <h2>Appeal No <?php echo $displayCampaign['id'] . "<br>" . $displayCampaign['campaignName'] ?> <a href="individualCampaignTable.php">(Back)</a></h2>           
        If you're using a mobile, you may scroll left/right to view the table.
  </section>

  <section style="overflow-x: auto;">
   <center>                  
      <?php if(isset($_GET['status']))
	{
		$id = $_GET['status'];
		
		if ($_GET['status'] == '1')
		{
			echo '<b style="color: green;">Update Completed</b>';
		}
		
	}
      
      ?>
    </center>
    
  <!-- PENDING APPROVAL DONATION TABLE -->    
     <table>
         <tr><th colspan="5"><center><h3>Pending Approvals</h3></center></th></tr>
         <tr>
    <th>ID</th>
    <th>Amount Donated</th>
    <th>Status</th>
    <th>Transaction Screenshot</th>
    <th><center>Actions</center></th>
  </tr>
  
         
  <?php 
         
        while($displayDonation = mysqli_fetch_assoc($finalDonation)) //LOOP
        {
        ?>
    <tr>
    <td><?php echo $displayDonation['id'] ?></td>
    <td>$<?php echo $displayDonation['amountDonated'] ?></td>
    <td><?php 
        if ($displayDonation['approvedByOrg'] == 0) //DONATION PENDING APPROVAL
        {
            echo 'Pending Approval';
        }
        else if ($displayDonation['approvedByOrg'] == 1) //DONATION APPROVED
        {
            echo 'Approved';
        }
        else //DONATION REJECTED
        {
            echo 'Rejected';
        }
        ?></td>
    <td> <a style="color:'red';" href="donationProof/<?php echo $displayDonation['transactionScreenshot'] ?> " target="_blank"><b>[VIEW]</b></a></td>
    <td>
    <center>
        <?php if ($displayDonation['approvedByOrg'] == 0)  //DONATION NOT APPROVED
                  {
        ?>
        <form action="check/checkApproveDonation.php" method="post">
        <input name="donationId" type="text" id="donationId" hidden=true value="<?php echo $displayDonation['id'] ?>">
        <input name="appealId" type="text" id="appealId" hidden=true value="<?php echo $campaignId ?>">
        <input name="amount" type="text" id="amount" hidden=true value="<?php echo $displayDonation['amountDonated'] ?>">
        <input type="submit" id="approve" name="approve" value="Approve" onClick="return confirmApprove()">
        </form>
        <hr>
        
        
        <form action="check/checkRejectDonation.php" method="post">
        <input name="donationId" type="text" id="donationId" hidden=true value="<?php echo $displayDonation['id'] ?>">
        <input name="appealId" type="text" id="appealId" hidden=true value="<?php echo $campaignId ?>">
        <input name="amount" type="text" id="amount" hidden=true value="<?php echo $displayDonation['amountDonated'] ?>">
        <input type="submit" id="reject" name="reject" value="Reject" onClick="return confirmReject()">
        </form>
        </center>    
    </td>
         </tr>
  <?php 
        }
            else //DONATION APPROVED
            {
                echo 'No Actions Available';
            }
        }
        ?>
</table>
      <br><br>
    
       
    
  <!-- APPROVED DONATION TABLE -->        
     <table>
         <tr><th colspan="4"><center><h3>Approved Donations</h3></center></th></tr>
         <tr>
    <th>ID</th>
    <th>Amount Donated</th>
    <th>Status</th>
    <th>Transaction Screenshot</th>
  </tr>
  
         
  <?php 
         
        while($displayDonationApproved = mysqli_fetch_assoc($finalDonationApproved)) //LOOP
        {
        ?>
    <tr>
    <td><?php echo $displayDonationApproved['id'] ?></td>
    <td>$<?php echo $displayDonationApproved['amountDonated'] ?></td>
    <td><?php 
        if ($displayDonationApproved['approvedByOrg'] == 0) //PENDING APPROVAL
        {
            echo 'Pending Approval';
        }
        else if ($displayDonationApproved['approvedByOrg'] == 1)//APPROVED
        {
            echo 'Approved';
        }
        else //REJECTED
        {
            echo 'Rejected';
        }
        ?></td>
    <td> <a style="color:'red';" href="donationProof/<?php echo $displayDonationApproved['transactionScreenshot'] ?> " target="_blank"><b>[VIEW]</b></a></td>
   
         </tr>
  <?php 
        }
        ?>
</table>
      
 <br><br>
      
  
      

    
 <!-- REJECETD DONATION TABLE -->      
     <table>
        <tr><th colspan="4"><center><h3>Rejected Donations</h3></center></th></tr>
         <tr>
    <th>ID</th>
    <th>Amount Donated</th>
    <th>Status</th>
    <th>Transaction Screenshot</th>
  </tr>
  
         
  <?php 
         
        while($displayDonationRejected = mysqli_fetch_assoc($finalDonationRejected))//LOOP
        {
        ?>
    <tr>
    <td><?php echo $displayDonationRejected['id'] ?></td>
    <td>$<?php echo $displayDonationRejected['amountDonated'] ?></td>
    <td><?php 
        if ($displayDonationRejected['approvedByOrg'] == 0) //PENDING APPROVAL
        {
            echo 'Pending Approval';
        }
        else if ($displayDonationRejected['approvedByOrg'] == 1)//APPROVED
        {
            echo 'Approved';
        }
        else//REJECTED
        {
            echo 'Rejected';
        }
        ?></td>
    <td> <a style="color:'red';" href="donationProof/<?php echo $displayDonationRejected['transactionScreenshot'] ?> " target="_blank"><b>[VIEW]</b></a></td>

         </tr>
  <?php 
        }
        ?>
</table>
      
  
             
           
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
            border: 3px solid black;
            margin: 20px;
            text-align:left;
            padding-left: 10px;
            
        }    
         
         .table-page {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            padding-top: 150px;
            padding-bottom: 50px;
            text-align: center;
        } 
         
         table {
             font-family: arial, sans-serif;
             border-collapse: collapse;
             width: 70%;
             margin: 0 auto;
             overflow-x: auto;
         }
         
         td, th {
             border: 1px solid #dddddd;
             text-align: left;
             padding: 8px;
         }
         
         tr:nth-child(even) {
             background-color: #dddddd;
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
    

<script>

function confirmApprove()
    {
        var agree=confirm("Confirm Approve?");
        if (agree)
            return true ;
        else
            return false ;
    }
    
function confirmReject()
    {
        var agree=confirm("Confirm Reject?");
        if (agree)
            return true ;
        else
            return false ;
    }
    

    
    
</script>
</body>


</html>
