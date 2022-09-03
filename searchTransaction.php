<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Search Transactions</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

   
      
  </head>

<body>

   <?php 
        $conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
    ?>

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
 
          <h2>Transaction Search</h2>           
      Please key in the following to search for your transaction<br>
      The details of the transaction is generated for you when you have made a donation submission.<br>
      <br>
      <font color="red">PLEASE DO NOT SHARE YOUR TRANSACTION NUMBER AND KEY</font>.
      
      
      <form action="check/checkSearchTransaction.php" method="post">
      <center>Transaction Number: <br><input name="transactionNo" type="text" id="transactionNo" required="required"><br></center><br>
      <center>Key: <br><input name="transactionKey" type="password" id="transactionKey" required="required"><br><br></center>
      <center><input type="submit" value="Search"></center>
      </form>
      <hr>
      
      <?php if(isset($_GET['status']))//IF THERE ARE WRONG INFO
	{
		
		if ($_GET['status'] == 'wronginfo')//WRONG CREDENTIAL INFOS
		{
			echo '<b style="color: red;">Wrong info. Please check your transaction number and key again</b>';
		}
		else if ($_GET['status'] == 'fail')//OTHER ERRORS
		{
			echo '<b style="color: red;">Something went wrong, please try again</b>';
		}
	}
    ?>
      
      <center>
          
          
          
          
          <?php
                        
if ($_GET['id'] == "search")
{
    
}
else
{

if(isset($_GET['key']))//IF THERE IS A KEY
{
    //TRANSACTION DISPLAY
$transactionMainId = $_GET['id'];  //SETS $transactionMainId VARIABLE TO URL ID
$sqlId = "SELECT * FROM donations WHERE id = '$transactionMainId'";//SELECT EVERYTHING FROM DONATIONS TABLE WHERE 'id' IS URL ID
$finalId = mysqli_query ($conn, $sqlId);//TABLE CONNECTION
$displayId = mysqli_fetch_assoc($finalId);//DISPLAY RESULT
              
//ORGANISATION DISPLAY
$organisationId = $displayId['orgId'];//SETS $organisationId VARIABLE TO ORGANISATION ID
$sqlOrgId = "SELECT * FROM organisations WHERE id = '$organisationId'";//SELECT EVERYTHING FROM ORGANISATION ACCOUNT WHERE 'id' IS ORGANISATION ID
$finalOrgId = mysqli_query ($conn, $sqlOrgId);//TABLE CONNECTION
$displayOrg = mysqli_fetch_assoc($finalOrgId);//DISPLAY RESULT
          
              
//CAMPAIGN DISPLAY
$campaignId = $displayId['campaignId'];//SETS $campaignId VARIABLE TO CAMPAIGN ID
$sqlCampaign = "SELECT * FROM campaigns WHERE id = '$campaignId'";//SELECT EVERYTHING FROM CAMPAIGNS TABLE WHERE 'id' IS CAMPAIGN ID
$finalCampaign = mysqli_query ($conn, $sqlCampaign);//TABLE CONNECTION
$displayCampaign = mysqli_fetch_assoc($finalCampaign);//DISPLAY RESULT
    
}
else
{
    header("Location:../searchTransaction.php?id=search&status=fail");//NO RESULT FOUND OR ERROR
    
}
}

?>
          
          
        <?php if ($_GET['id'] == "search") 
    { ?>
          
<?php }
          else
          { 
          if ($_GET['key'] != $displayId['passwordKey'])
          {
              header("Location:../searchTransaction.php?id=search&status=wronginfo");//WRONG INFO KEYED
          }
          
          ?>
              
          
          <h2>Transaction Details: </h2><br>
        
     Transaction Number: <b><font color="red"><?php echo $displayId['id'] ?></font></b> <br><br>
     Key: <b><font color="red"><?php echo $displayId['passwordKey']?></font></b><br><br>
     Amount Donated: <b>SGD$ <?php echo $displayId['amountDonated']?></b><br><br>
     Organisation Name: <b><?php echo $displayOrg['organisationName']?> (ID: <?php echo $displayOrg['id'] ?>)</b><br><br> 
     Campaign: <b><?php echo $displayCampaign['campaignName']?> (Appeal No: <?php echo $displayCampaign['id'] ?>)</b><br><br>
    
          
     Approval Status: <br><b>
          
          <?php 
           if ($displayId['approvedByOrg'] == '0')
           {
               echo "Pending";
           }
              else if ($displayId['approvedByOrg'] == '1')
              {
                  echo "<font color='green'>Approved</font>";
              }
              else
              {
                  echo "<font color='red'>Rejected, please contact us with the above information for the reason</font>";
              }
          ?>
          
          </b><br><br>
          
          <?php }
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
</body>


</html>
