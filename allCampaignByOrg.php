<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Campaigns</title>

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
 if(isset($_GET['id']))
	{
		$id = $id = $_GET['id'];//GET URL "id" NUMBER
    }
$conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
              
//ORGANISATION DISPLAY--------------------------------------------------------
$sqlOrgCampaigns = "SELECT * FROM campaigns WHERE  campaignOrganisation = '$id'"; //SQL COMMAND, SELECT EVERYTHING FROM CAMPAIGNS TABLE
$finalOrgCampaigns = mysqli_query ($conn, $sqlOrgCampaigns); //TABLE CONNECTION
$sqlOrgName = "SELECT organisations.organisationName FROM organisations INNER JOIN campaigns ON organisations.id = campaigns.campaignOrganisation WHERE campaignOrganisation = '$id'";//SQL COMMAND, SELECT ORGANISATION NAME FROM ORGANISATION TABLE
$finalOrgName = mysqli_query ($conn, $sqlOrgName);//TABLE CONNECTION
$displayOrganisationName = mysqli_fetch_assoc($finalOrgName)//DISPLAY RESULTS
              
              
?>
 <h2>Ongoing Campaigns by <?php echo $displayOrganisationName['organisationName'] ?></h2>           
         </div>
      </div>
    </div>
  </section>
 
<section class="upcoming-meetings" id="meetings">
    <div class="container" style="margin-top: -200px">
      <div class="row">
          
       <!-- Ongoing Campaigns START -->
          <center>
        <div class="col-lg-12">
          <div class="row">
              
              <?php 
             
                  while ($displayCampaigns = mysqli_fetch_assoc($finalOrgCampaigns)) //SQL TABLE LOOP
              {
              ?>
               <div class="col-lg-4">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>Total Collected: $<?php echo $displayCampaigns['amountCollected'] ?></span>
                  </div>
                  <a href="campaignDetails.php?id=<?php echo $displayCampaigns['id'] ?>"><img src="organisationCampaignImg/<?php echo $displayCampaigns['campaignImage'] ?>" style="height: 300px; object-fit: cover;"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6><?php 
                        
                        if ($displayCampaigns['campaignMonth'] == "01") //January
                        {
                            echo 'Jan';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "02")//February
                        {
                            echo 'Feb';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "03")//March
                        {
                            echo 'Mar';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "04")//April
                        {
                            echo 'Apr';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "05")//May
                        {
                            echo 'May';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "06")//June
                        {
                            echo 'Jun';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "07")//July
                        {
                            echo 'Jul';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "08")//August
                        {
                            echo 'Aug';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "09")//September
                        {
                            echo 'Sept';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "10")//October
                        {
                            echo 'Oct';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "11")//November
                        {
                            echo 'Nov';
                        }
                        else if ($displayCampaigns['campaignMonth'] == "12")//December
                        {
                            echo 'Dec';
                        }
                  
                    ?>
                    <span><?php echo $displayCampaigns['campaignDay'] ?></span></h6>
                  </div>
                  <a href="campaignDetails.php?id=<?php echo $displayCampaigns['id'] ?>"><h4 style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 20ch;"><?php echo $displayCampaigns['campaignName'] ?></h4></a>
                  <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 28ch;"><?php echo $displayCampaigns['campaignDetails'] ?><br> <a href="campaignDetails.php?id=<?php echo $displayCampaigns['id'] ?>">View more</a></p>
                </div>
              </div>
            </div>
              <?php
                        } 
              ?>
        <!-- Ongoing Campaigns END -->      
           
            
          
              
          </div>
        </div>
          </center>
      </div>
    </div>
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
