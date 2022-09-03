<!DOCTYPE html>

<?php 

    $conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
    $sqlCount = "SELECT COUNT(*) as totalCount FROM organisations ";//SQL CODE, SELECT THE ROW COUNT OF EVERYTHING FROM ORGANISATIONS TABLE
    $finalCount = mysqli_query ($conn, $sqlCount);//TABLE CONNECTION
    $displayCount = mysqli_fetch_assoc($finalCount);//DISPLAY RESULTS

    $sqlSumDonated = "SELECT SUM(amountCollected) as sumDonated FROM campaigns ";//SQL CODE, SELECT THE SUM OF amountCollected COLUMN FROM CAMPAIGNS TABLE
    $finalSumDonated = mysqli_query ($conn, $sqlSumDonated);//TABLE CONNECTION
    $displaySumDonated = mysqli_fetch_assoc($finalSumDonated);//DISPLAY RESULTS

    $sqlTotalCampaigns = "SELECT COUNT(*) as totalCampaigns FROM campaigns ";//SQL CODE, SELECT THE ROW COUNT OF EVERYTHING FROM CAMPAIGN TABLE
    $finalTotalCampaigns = mysqli_query ($conn, $sqlTotalCampaigns);//TABLE CONNECTION
    $displayTotalCampaigns = mysqli_fetch_assoc($finalTotalCampaigns);//DISPLAY RESULTS

    $sqlTotalDonations = "SELECT COUNT(*) as totalDonations FROM donations WHERE approvedByOrg = 1 ";//SQL CODE, SELECT THE ROW COUNT OF EVERYTHING FROM DONATION TABLE WHERE DONATION IS APPROVED
    $finalTotalDonations = mysqli_query ($conn, $sqlTotalDonations);//TABLE CONNECTION
    $displayTotalDonations = mysqli_fetch_assoc($finalTotalDonations);//DISPLAY RESULTS

    $sqlCampaigns = "SELECT campaigns.id AS campaignId, campaigns.campaignName AS campaignName, campaigns.campaignDetails AS campaignDetails, campaigns.finalAmount AS campaignFinalAmount, campaigns.amountCollected AS campaignAmountCollected, campaigns.stillRunning AS campaignStillRunning, campaigns.campaignOrganisation AS campaignOrganisation, campaigns.campaignImage AS campaignImage, campaigns.campaignDay AS campaignDay, campaigns.campaignMonth AS campaignMonth, campaigns.campaignYear AS campaignYear, organisations.id AS organisationId, organisations.organisationApproved AS organisationApproved FROM campaigns INNER JOIN organisations ON campaigns.campaignOrganisation = organisations.id WHERE campaigns.stillRunning = '1' && organisations.organisationApproved = '2' ORDER BY campaigns.id DESC LIMIT 6"; //SQL CODE, SELECT LISTED COLUMNS FROM CAMPAIGNS AND ORGANISATION TABLE WHERE CAMPAIGNS ARE STILL RUNNING AND ORGANISATION IS APPROVED, DISPLAY LIMIT TO 6 AND SORT BY DESCENDING ORDER
    $finalCampaigns = mysqli_query ($conn, $sqlCampaigns);//TABLE CONNECTION

    $sqlCheckNoCampaign = "SELECT COUNT(*) as runningCampaigns FROM campaigns WHERE stillRunning = '1'";//SELECT THE ROW COUNT OF EVERYTHING IN CAMPAIGNS TABLE WHERE CAMPAIGN IS STILL RUNNING
    $finalCheckNoCampaign = mysqli_query ($conn, $sqlCheckNoCampaign);//TABLE CONNECTION
    $displayCheckNoCampaign = mysqli_fetch_assoc($finalCheckNoCampaign);//DISPLAY RESULTS
    
    
?>


<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>ProjectFundMe - Platform for fundraisers</title>

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

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <source src="assets/images/singaporebanner.mp4" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h6>Hello!</h6>
              <h2>Welcome to Project FundMe</h2>
              <p>The one-stop platform for you to donate, appeal and fundraise your project/charity needs. </p>
              <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#meetings">View ongoing campaigns</a></div>
              </div>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
          
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-01.png" alt="">
              </div>
              <div class="down-content">
                <h4>Safe and Secure Transactions</h4>
                <p>We will never ask for your credit/debit card details, all transactions are done through your own bank transfers.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div>
              <div class="down-content">
                <h4>Anonymous Donations</h4>
                <p>You are not required to provide your personal details to us, and we do not collect them for our own usage.</p>
              </div>
            </div>
            
            <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>Stay Safe From Unlawful Collectors!</h4>
                <p>On-the-street fundraising may be fake, check the information with us and make the donation online instead to prevent fraud.</p>
              </div>
            </div>
              
              <div class="item">
              <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div>
              <div class="down-content">
                <h4>Approved Organisations</h4>
                <p>All organisations shown here are all approved by us, so you'll feel safer when checking their information with us.<br></p>
              </div>
            </div>
            
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
              
              <?php 
              if ($displayCheckNoCampaign['runningCampaigns'] == 0)//IF THERE IS NO RUNNING CAMPAIGNS
              {
                  echo '<h2>No Ongoing Campaigns</h2>';
              }
              else
              {
                  echo '<h2>Latest Ongoing Campaigns</h2>'; //IF THERE ARE RUNNING CAMPAIGNS
              }
                  
              ?>
              
            
          </div>
        </div>
          
       <!-- Ongoing Campaigns START -->
          <center>
        <div class="col-lg-12">
          <div class="row">
              
              <?php 
              if ($displayCheckNoCampaign['runningCampaigns'] == 0)//NO RUNNING CAMPAIGNS
              {
                  
              }
              else
              {
                  while ($displayCampaigns = mysqli_fetch_assoc($finalCampaigns))//THERE ARE ONGOING CAMPAIGNS, LOOP
              {
              ?>
               <div class="col-lg-4">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>Total Collected: $<?php echo $displayCampaigns['campaignAmountCollected'] ?></span>
                  </div>
                  <a href="campaignDetails.php?id=<?php echo $displayCampaigns['campaignId'] ?>"><img src="organisationCampaignImg/<?php echo $displayCampaigns['campaignImage'] ?>" style="height: 300px; object-fit: cover;"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6><?php 
                        
                        if ($displayCampaigns['campaignMonth'] == "01")// January
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
                  <a href="campaignDetails.php?id=<?php echo $displayCampaigns['campaignId'] ?>"><h4 style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 20ch;"><?php echo $displayCampaigns['campaignName'] ?></h4></a>
                  <p style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 28ch;"><?php echo $displayCampaigns['campaignDetails'] ?><br> <a href="campaignDetails.php?id=<?php echo $displayCampaigns['campaignId'] ?>">View more</a></p>
                </div>
              </div>
            </div>
              <?php
              }
              }
              
              ?>
              
           
            
          
              
          </div>
        </div>
          </center>
      </div>
    </div>
  </section>

  <section class="our-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>A Few Facts About Our Website</h2>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content dollar">
                      <center>
                    <div class="count-digit"><?php echo $displaySumDonated['sumDonated'] ?></div>
                    <div class="count-title">Total amount donated</div>
                        </center>
                  </div>
                </div>
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit"> <?php echo $displayCount['totalCount'] ?> </div>
                    <div class="count-title">Registered Organisations</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit"><?php echo $displayTotalDonations['totalDonations'] ?></div>
                    <div class="count-title">Donations Made</div>
                  </div>
                </div> 
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit"><?php echo $displayTotalCampaigns['totalCampaigns'] ?></div>
                    <div class="count-title">Total Campaigns Ran</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6 align-self-center">

            <img src="assets/images/donationPic.jpg">
         
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">
   
    <div class="footer">
      <p>Project FundMe CM3070 Final Project, Chan Gang Yi</p>
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