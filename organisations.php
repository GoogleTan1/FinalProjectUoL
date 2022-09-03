<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Organisations</title>

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

 
       <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
   
    
<?php


$conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
              
//ORGANISATION DISPLAY
$sqlOrg = "SELECT organisations.id AS orgId, organisations.organisationName AS orgName, accounts.email_address AS email FROM organisations INNER JOIN accounts ON accounts.id = organisations.organisationOwner WHERE organisationApproved = '2'"; //SELECT LISTED COLUMNS FROM ORGANISATIONS AND ACCOUNTS TABLE WHERE LOGGED IN ID AND ORGANISATION MATCHES AND ORGANISATION IS APPROVED
$finalOrg = mysqli_query ($conn, $sqlOrg);//TABLE CONNECTION
              
              
?>

      

            
          <h2>All Approved Organisations</h2>           
         </div>
      </div>
    </div>
  </section>
 

    <center>
  <section style="margin-top: 10px;">
      <div>
        <?php 
        while($displayOrg = mysqli_fetch_assoc($finalOrg))//LOOP
        {
        ?>               
        <div class="main">
            <center>
            <div class="column1">
                <h4><a href="allCampaignByOrg.php?id=<?php echo $displayOrg['orgId'] ?>"><?php echo $displayOrg['orgName'] ?></a></h4>
            </div>
         
            <div id="bottom">
            <b>Organisation ID: </b> <?php echo $displayOrg['orgId'] ?><br>
            <b>Email: </b> <?php echo $displayOrg['email'] ?>
            </div>
                </center>
      </div>
     <?php } ?>  
      </div>
  </section>
    </center>

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

         
         .main {
        border: 3px solid black;
        height: 200px;
        width: 400px;
        position: relative;
        margin: 5px;
        display: inline-block;
       

        
             
      }
      .column1 {
        padding: 10px;
        position: absolute;
        top: 0;
        text-align:left;
        word-break:normal;
        
      }
      
      #bottom {
        padding: 10px;
        position:absolute;
        bottom: 0;
        text-align: left;
        word-break:break-all;
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
             width: 80%;
             margin: 0 auto;
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
