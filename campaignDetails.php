<!DOCTYPE html>
<html lang="en">

<?php 

   if(isset($_GET['id']))
{
    $id = $_GET['id']; //RETRIEVE URL 'id'
		
} 
    
    
    $conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABSE CONNECTION 

    $sqlCampaign = "SELECT * FROM campaigns WHERE id = '$id'";//SQL CODE, SELECT EVERYTHING FROM CCAMPAIGNS TABLE WHERE 'id' IS URL ID
    $finalCampaign = mysqli_query ($conn, $sqlCampaign);//TABLE CONNECTION
    $displayCampaign = mysqli_fetch_assoc($finalCampaign);//DISPLAY RESULTS  
    $organisationId = $displayCampaign['campaignOrganisation'];//SETS variable $organisationId = campaignOrganisation id FROM campaigns TABLE
    
    $sqlOrg = "SELECT * FROM organisations WHERE id = '$organisationId'";//SQL CODE, SELECT EVERYTHING FROM ORGANISATIONS TABLE WHERE 'id' is $organisationId VARIABLE
    $finalOrg = mysqli_query ($conn, $sqlOrg);//TABLE CONNECTION
    $displayOrg = mysqli_fetch_assoc($finalOrg);//DISPLAY RESULTS
    
?>    
    
    
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - <?php echo $displayCampaign['campaignName'] ?></title>

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
          <h2><?php echo $displayCampaign['campaignName'] ?></h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                  <div class="price">
                    <span>$<?php echo $displayCampaign['amountCollected'] ?>/$<?php echo $displayCampaign['finalAmount'] ?></span>
                  </div>
                  <div class="date">
                    <h6><?php 
                        
                        if ($displayCampaign['campaignMonth'] == "01") //Janurary
                        {
                            echo 'Jan';
                        }
                        else if ($displayCampaign['campaignMonth'] == "02")//February
                        {
                            echo 'Feb';
                        }
                        else if ($displayCampaign['campaignMonth'] == "03")//March
                        {
                            echo 'Mar';
                        }
                        else if ($displayCampaign['campaignMonth'] == "04")//April
                        {
                            echo 'Apr';
                        }
                        else if ($displayCampaign['campaignMonth'] == "05")//May
                        {
                            echo 'May';
                        }
                        else if ($displayCampaign['campaignMonth'] == "06")//June
                        {
                            echo 'Jun';
                        }
                        else if ($displayCampaign['campaignMonth'] == "07")//July
                        {
                            echo 'Jul';
                        }
                        else if ($displayCampaign['campaignMonth'] == "08")//August
                        {
                            echo 'Aug';
                        }
                        else if ($displayCampaign['campaignMonth'] == "09")//September
                        {
                            echo 'Sept';
                        }
                        else if ($displayCampaign['campaignMonth'] == "10")//October
                        {
                            echo 'Oct';
                        }
                        else if ($displayCampaign['campaignMonth'] == "11")//November
                        {
                            echo 'Nov';
                        }
                        else if ($displayCampaign['campaignMonth'] == "12")//December
                        {
                            echo 'Dec';
                        }
                  
                    ?> 
   
                        <span><?php echo $displayCampaign['campaignDay'] ?></span></h6>
                  </div>
                  <a href="meeting-details.html"><img src="organisationCampaignImg/<?php echo $displayCampaign['campaignImage'] ?>" style="height: 500px; object-fit: cover;"></a>
                </div>
                <div class="down-content">
                  <a href="meeting-details.html"><h4><?php echo $displayCampaign['campaignName'] ?></h4></a>
                  <p>Appeal No. <?php echo $displayCampaign['id'] ?></p>
                  <p class="description">
                    <?php echo $displayCampaign['campaignDetails'] ?>
                  </p>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="hours">
                        <h5>Organisation</h5>
                        <p><?php echo $displayOrg['organisationName'] ?><br>
                        Organisation ID: <?php echo $displayOrg['id'] ?> 
                        </p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="book now">
                        <h5>Organisation Bank</h5>
                          
                        <p><?php echo $displayCampaign['bankType'] . ": " . $displayCampaign['bankAccountNo'] ?></p>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
                <?php if ($displayCampaign['stillRunning'] == '1') //Campaign is still running
{ ?>
    
                <div class="main-button-red">
                <a href="donateNow.php?id=<?php echo $displayCampaign['id'] ?>">Donate Now</a>
              </div>
                
<?php }
                            else//Campaign is not running
                            {?>
                <center>
                                <div class="main-button-gray">
                <a>Campaign Has Ended</a>
              </div>
                </center>
                            <?php }
                ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
     
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
