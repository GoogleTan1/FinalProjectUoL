<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Transaction Complete</title>

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
   
             
 <?php
                        

$conn = mysqli_connect("localhost","root","","finalprojectdb"); //DATABASE CONNECTION
              
//TRANSACTION DISPLAY
$transactionMainId = $_GET['id'];  //SET $transactionMainId VARIABLE TO URL ID
$sqlId = "SELECT * FROM donations WHERE id = '$transactionMainId'"; //SELECT EVERYTHING FROM DONATIONS TABLE WHERE 'id' IS DONATION ID
$finalId = mysqli_query ($conn, $sqlId);//TABLE CONNECTION
$displayId = mysqli_fetch_assoc($finalId);//DISPLAY RESULTS
              
//ORGANISATION DISPLAY
$organisationId = $displayId['orgId'];//SET $organisationId VARIABLE TO ORGANISATION ID
$sqlOrgId = "SELECT * FROM organisations WHERE id = '$organisationId'";//SELECT EVERYTHING FROM ORGANISATIONS TABLE WHERE 'id' IS ORGANISATION ID
$finalOrgId = mysqli_query ($conn, $sqlOrgId);//TABLE CONNECTION
$displayOrg = mysqli_fetch_assoc($finalOrgId);//DISPLAY RESULTS
          
              
//CAMPAIGN DISPLAY
$campaignId = $displayId['campaignId'];//SET $campaignId VARIABLE TO CAMPAIGN ID
$sqlCampaign = "SELECT * FROM campaigns WHERE id = '$campaignId'";//SELECT EVERYTHING FROM CAMPAIGNS TABLE WHERE 'id' IS CAMPAIGN ID
$finalCampaign = mysqli_query ($conn, $sqlCampaign);//TABLE CONNECTION
$displayCampaign = mysqli_fetch_assoc($finalCampaign);//DISPLAY RESULTS
              
if ($_GET['key'] == "")
{
    header("Location:../index.php");//ERROR
}
?>

      

            
          <h2>Upload Complete</h2>           
      Please review the details and <b>save the transaction number and key somewhere</b> (These information may be used to retrieve certain info).<br>
      <b><font color='red'>Once you leave this page, you will not be able to retrieve the same information again.</font></b><br>
      <br>
      <font color="red">PLEASE DO NOT SHARE YOUR TRANSACTION NUMBER AND KEY</font>.<hr>
      
      
      <center>
    <h2>Transaction Details: </h2><br>
        
     Transaction Number: <b><font color="red"><?php echo $displayId['id'] ?></font></b> <br><br>
     Key: <b><font color="red"><?php echo $displayId['passwordKey']?></font></b><br><br>
     Amount Donated: <b>SGD$ <?php echo $displayId['amountDonated']?></b><br><br>
     Organisation Name: <b><?php echo $displayOrg['organisationName']?> (ID: <?php echo $displayOrg['id'] ?>)</b><br><br> 
     Campaign: <b><?php echo $displayCampaign['campaignName']?> (Appeal No: <?php echo $displayCampaign['id'] ?>)</b><br><br> 
          
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
