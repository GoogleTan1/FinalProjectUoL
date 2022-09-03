<!DOCTYPE html>
<html lang="en">

<?php 

   if(isset($_GET['id']))
{
    $id = $_GET['id']; //GETS 'id' FROM URL
		
} 
    
    error_reporting(0); //suppress errors workaround
    $conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION

    $sqlCampaign = "SELECT * FROM campaigns WHERE id = '$id'";//SQL CODE, SELECT EVERYTHING FROM CAMPAIGNS TABLE WHERE 'id' IS URL ID
    $finalCampaign = mysqli_query ($conn, $sqlCampaign);//TABLE CONNECTION
    $displayCampaign = mysqli_fetch_assoc($finalCampaign);//DISPLAY RESULTS
    
    $organisationId = $displayCampaign['campaignOrganisation'];//SET $organisationId VARIABLE TO 'campaignOrganisation' NUMBER FROM ABOVE SQL
    $sqlOrg = "SELECT * FROM organisations WHERE id = '$organisationId'";//SELECT EVERYTHING FROM ORGANISATION TABLE WHERE 'id' IS $organisationId VARIABLE
    $finalOrg = mysqli_query ($conn, $sqlOrg);//TABLE CONNECTION
    $displayOrg = mysqli_fetch_assoc($finalOrg);//DISPLAY RESULTS
    
  
	      
   
    
  ?>
    
    
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Donate</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
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

<?php //CHECK FOR LOGIN
                        
    $accountLoggedIn = false;          
                        
                        
     if ($_SESSION['MM_Username'] == '')
     {
	   $accountLoggedIn = false;   
     }
     else
     {
       $accountLoggedIn = true;
    //PROFILE DISPLAY
       $uname_i = $_SESSION['MM_Username']; //SETS $uname_i VARIABLE TO LOGGED IN USERNAME
       $sqlMain = "SELECT * FROM accounts WHERE username = '$uname_i' "; //SELECT EVERYTHING FROM ACCOUNTS TABLE WHERE USERNAME IS LOGGED IN USERNAME
       $finalMain = mysqli_query ($conn, $sqlMain);//TABLE CONNECTION
       $displayMain = mysqli_fetch_assoc($finalMain);//DISPLAY RESULTS
     }
    ?>
    
    
  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2><?php echo $displayCampaign['campaignName'] ?></h2>
        </div>
      </div>
    </div>
  </section>
    <center>

</center>
  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                    <!-- Error display --> 
                    <center>
                  <?php if(isset($_GET['statusId']))
	{
		
		if ($_GET['statusId'] == '1')//UPLOADED WRONG FORMAT
		{
			echo '<b style="color: red;">Please upload images only in PNG or JPEG</b>';
		}
        else if ($_GET['statusId'] == '2')//FILE SIZE EXCEEDED MAX
		{
			echo '<b style="color: red;">File size must not exceed 1GB</b>';
		}
        else if ($_GET['statusId'] == '3')//OTHER ERRORS
		{
			echo '<b style="color: red;">Something went wrong, please check your file size and file type (PNG, JPEG, JPG and less than 1GB in size)</b>';
		}
        
        
	} ?></center>
                  <div class="price">
                      
                                          
      
                      
                      
                      
                    <span>$<?php echo $displayCampaign['amountCollected'] ?>/$<?php echo $displayCampaign['finalAmount'] ?></span>
                  </div>
                  <div class="date">
                    <h6><?php 
                        
                        if ($displayCampaign['campaignMonth'] == "01") //January
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
                    <hr>
                    
                    <div class="row">
                    
                          
                          <center>
     
                              
                        <h5>Donation Instructions</h5>
                        <p>To protect your information, all transactions will be through the bank of your choice via <b>bank transfers</b>. Please make the transaction <b>ONLY</b> through your bank to the <font color="red">organisation bank number stated above</font>.
                        Once you have made the transaction, <b>take a screenshot of the transaction and upload here</b>. <br>
                            <br>
                            All uploads will be reviewed by the organisation and given a tracking number. <br><font color="red">Please do not lose this tracking number as it will be used to retrieve your transaction status</font>.<br><br>
                            
                            <?php 
                                if ($accountLoggedIn == false)
                                { ?>
                                    If you wish to keep track of your donation, please login with an account <a href="../login.php">here</a>
                                <?php }
                            ?>
                            
                        </p>
                              <br>
                              <form action="check/checkDonation.php" method="post" enctype="multipart/form-data">
                            <center><input name="orgId" type="text" id="orgId" required="required" value="<?php echo $displayOrg['id'] ?>" hidden="true" readonly ></center> <!-- Organisation ID -->
                            <center><input name="campaignId" type="text" id="campaignId" required="required" value="<?php echo $displayCampaign['id']?>" hidden="true" readonly></center> <!-- Campaign ID -->
                                
                             <?php 
                             
                                if ($accountLoggedIn == true)
                                { ?>
                                    <center><input name="accountId" type="text" id="accountId" required="required" value="<?php echo $displayMain['id'] ?>" hidden="true" readonly></center> <!-- Account ID -->
                                    <center>Username: <br><input name="username" type="text" id="username" required="required" value="<?php echo $displayMain['username'] ?>" readonly><br></center><br>
                                <?php }
                                else
                                { ?>
                                    
                                  <center>Name: <br><input name="name" type="text" id="name" required="required" value="Anonymous" disabled="true"><br></center><br>
                                  
                                <?php }
    
                             ?>     
                                  
                             
                            <center>Amount (SGD$): <br><input name="amount" type="number" id="amount" required="required"><br><br></center> 
                            <center>Transaction Screenshot: <input type="file" name="fileToUpload" id="fileToUpload"></center>
                                  
                                  
                                  <hr>
                             <?php 
                                if ($displayCampaign['stillRunning'] == '1')
                                { ?>
                                    <center><input type="submit" value="Submit Donation"></center>
                                <?php }
                                  else
                                  { ?>
                                    <center><input type="submit" value="Campaign has ended" disabled="true"></center>
                                  <?php }
                                ?>     
                                  
                            
                            </form>
                              
                              
                              
                              
                          </center>
                          
                      </div>
                    
                    
                </div>
              </div>
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
