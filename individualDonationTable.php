<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Donations</title>

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
//Check if logged in END
              
              
              
              
		


$uname_i = $_SESSION['MM_Username'];//SETS $uname_i VARIABLE TO LOGGED IN USERNAME
$conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
              
//PROFILE DISPLAY
$sqlMain = "SELECT * FROM accounts WHERE username = '$uname_i' ";//SQL CODE, SELECT EVERYTHING FROM ACCOUNTS TABLE WHERE USERNAME IS LOGGED IN USERNAME
$finalMain = mysqli_query ($conn, $sqlMain);//TABLE CONNECTION
$displayMain = mysqli_fetch_assoc($finalMain);   //DISPLAY RESULTS
$accountId = $displayMain['id'];//SETS $accountId VARIABLE TO LOGGED IN ID
              
//DONATION DISPLAY PENDING
$sqlDonationPending = "SELECT donations.id AS dId, campaigns.campaignName AS cName, campaigns.id AS cId, donations.amountDonated AS dDonated, donations.approvedByOrg AS dStatus, donations.transactionScreenshot AS dScreenshot FROM donations INNER JOIN campaigns ON donations.campaignId = campaigns.id WHERE donations.accountId = '$accountId' && donations.approvedByOrg = '0'";//SELECT LISTED COLUMNS FROM DONATIONS AND CAMPAIGNS TABLE WHERE ACCOUNT ID IS LOGGED IN ID AND DONATION IS PENDING APPROVAL
$finalDonationPending = mysqli_query ($conn, $sqlDonationPending);

              
//DONATION DISPLAY APPROVED
$sqlDonationApproved = "SELECT donations.id AS dId, campaigns.campaignName AS cName, campaigns.id AS cId, donations.amountDonated AS dDonated, donations.approvedByOrg AS dStatus, donations.transactionScreenshot AS dScreenshot FROM donations INNER JOIN campaigns ON donations.campaignId = campaigns.id WHERE donations.accountId = '$accountId' && donations.approvedByOrg = '1'";//SELECT LISTED COLUMNS FROM DONATIONS AND CAMPAIGNS TABLE WHERE ACCOUNT ID IS LOGGED IN ID AND DONATION IS APPROVED
$finalDonationApproved = mysqli_query ($conn, $sqlDonationApproved);
              
//DONATION DISPLAY REJECTED
$sqlDonationRejected = "SELECT donations.id AS dId, campaigns.campaignName AS cName, campaigns.id AS cId, donations.amountDonated AS dDonated, donations.approvedByOrg AS dStatus, donations.transactionScreenshot AS dScreenshot FROM donations INNER JOIN campaigns ON donations.campaignId = campaigns.id WHERE donations.accountId = '$accountId' && donations.approvedByOrg = '2'";//SELECT LISTED COLUMNS FROM DONATIONS AND CAMPAIGNS TABLE WHERE ACCOUNT ID IS LOGGED IN ID AND DONATION IS REJECTED
$finalDonationRejected = mysqli_query ($conn, $sqlDonationRejected);
    
          
?>

      

            
          <h2>Donation History <a href="profile.php">(Back)</a></h2>           
        If you're using a mobile, you may scroll left/right to view the table.
  </section>

  <section style="overflow-x: auto;">
   <center>                  
      <?php if(isset($_GET['status']))
	{
		$id = $_GET['status'];
		
		if ($_GET['status'] == '1')//DISPLAYS UPDATE IS COMPLETED
		{
			echo '<b style="color: green;">Update Completed</b>';
		}
		
	}
      
      ?>
    </center>
    
      <!-- Pending Donations -->  
     <table>
         <tr><th colspan="5"><center><h3>Pending Approvals</h3></center></th></tr>
         <tr>
    <th>Donation ID</th>
    <th>Campaign</th>
    <th>Amount Donated</th>
    <th>Status</th>
    <th>Transaction Screenshot</th>
  </tr>
  
         
  <?php 
         
        while($displayDonationPending = mysqli_fetch_assoc($finalDonationPending))//LOOP
        {
        ?>
    <tr>
    <td><?php echo $displayDonationPending['dId']?></td>
    <td><a href="../campaignDetails.php?id=<?php echo $displayDonationPending['cId'] ?>" target="_blank"><font color="blue"><?php echo $displayDonationPending['cName']?></font></a></td>
    <td>$<?php echo $displayDonationPending['dDonated'] ?></td>
    <td><?php 
        if ($displayDonationPending['dStatus'] == 0)//PENDING APPROVAL
        {
            echo 'Pending Approval';
        }
        else if ($displayDonationPending['dStatus'] == 1)//APPROVED
        {
            echo 'Approved';
        }
        else//REJECTED
        {
            echo 'Rejected';
        }
        ?></td>
    <td> <a style="color:'red';" href="donationProof/<?php echo $displayDonationPending['dScreenshot'] ?> " target="_blank"><b>[VIEW]</b></a></td>
   
         </tr>
  <?php 
        
           
        }
        ?>
</table>
      <br><br>
      
      
      
   <!-- Approved Donations -->   

     <table>
         <tr><th colspan="5"><center><h3>Approved Donations</h3></center></th></tr>
         <tr>
    <th>Donation ID</th>
    <th>Campaign</th>
    <th>Amount Donated</th>
    <th>Status</th>
    <th>Transaction Screenshot</th>
  </tr>
  
         
  <?php 
         
        while($displayDonationApproved = mysqli_fetch_assoc($finalDonationApproved))//LOOP
        {
        ?>
    <tr>
    <td><?php echo $displayDonationApproved['dId']?></td>
    <td><a href="../campaignDetails.php?id=<?php echo $displayDonationApproved['cId'] ?>" target="_blank"><font color="blue"><?php echo $displayDonationApproved['cName']?></font></a></td>
    <td>$<?php echo $displayDonationApproved['dDonated'] ?></td>
    <td><?php 
        if ($displayDonationApproved['dStatus'] == 0)//PENDING APPROVAL
        {
            echo 'Pending Approval';
        }
        else if ($displayDonationApproved['dStatus'] == 1)//APPROVED
        {
            echo 'Approved';
        }
        else//REJECTED
        {
            echo 'Rejected';
        }
        ?></td>
    <td> <a style="color:'red';" href="donationProof/<?php echo $displayDonationApproved['dScreenshot'] ?> " target="_blank"><b>[VIEW]</b></a></td>
   
         </tr>
  <?php 
        
           
        }
        ?>
</table>
      
 <br><br>
     
      
<!-- Rejected Donations -->   

               <center><font color="red"><b>Please contact us for any rejected donations</b></font></center>

     <table>
         <tr><th colspan="5"><center><h3>Rejected Donations</h3></center></th></tr>
         <tr>
    <th>Donation ID</th>
    <th>Campaign</th>
    <th>Amount Donated</th>
    <th>Status</th>
    <th>Transaction Screenshot</th>
  </tr>
  
         
  <?php 
         
        while($displayDonationRejected = mysqli_fetch_assoc($finalDonationRejected))//LOOP
        {
        ?>
    <tr>
    <td><?php echo $displayDonationRejected['dId']?></td>
    <td><a href="../campaignDetails.php?id=<?php echo $displayDonationRejected['cId'] ?>" target="_blank"><font color="blue"><?php echo $displayDonationRejected['cName']?></font></a></td>
    <td>$<?php echo $displayDonationRejected['dDonated'] ?></td>
    <td><?php 
        if ($displayDonationRejected['dStatus'] == 0)//PENDING APPROVAL
        {
            echo 'Pending Approval';
        }
        else if ($displayDonationRejected['dStatus'] == 1)//APPROVED
        {
            echo 'Approved';
        }
        else//REJECTED
        {
            echo 'Rejected';
        }
        ?></td>
    <td> <a style="color:'red';" href="donationProof/<?php echo $displayDonationRejected['dScreenshot'] ?> " target="_blank"><b>[VIEW]</b></a></td>
   
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
