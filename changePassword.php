<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Change Password</title>

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
              
$sqlMain = "SELECT * FROM accounts WHERE username = '$uname_i' ";//SELECT EVERYTHING FROM ACCOUNTS TABLE WHERE USERNAME IS LOGGED IN USERNAME
$finalMain = mysqli_query ($conn, $sqlMain);//TABLE CONNECTION
$displayMain = mysqli_fetch_assoc($finalMain);//DISPLAY RESULTS
              
?>
<!-- Check if logged in END -->
            
          <h2>Change Password <a href="profile.php">(Back)</a></h2><br>
              
            
              
              
        </div>
      </div>
    </div>
  </section>

  <section>
<center>
      <!-- Error display -->                     
        <?php if(isset($_GET['id']))
	{
		$id = $id = $_GET['id'];
		
		if ($_GET['id'] == '1')//Update of password is unsuccessful
		{
			echo '<b style="color: red;">Update Unsuccessful, Try Again</b>'; 
		}
		else if ($_GET['id'] == '2')//Update of password success
		{
			echo '<b style="color: Green;">Update Successful</b>';
		}
    else if ($_GET['id'] == '3')//Password and retype password did not match
		{
			echo '<b style="color: red;">New Password did not match. Try Again</b>';
		}
    else if ($_GET['id'] == '4')//Old password is wrong
		{
			echo '<b style="color: red;">Old password is wrong. Try Again</b>';
		}
        
        
	}
		?></center>
                            <br>
                            <form action="check/checkUpdatePassword.php" method="post" class="updateForm">
                            

                                
                                
                           <center><br>
                            <b>Old Password: </b><br>
                            <input name="oldPassword" type="password" id="oldPassword" required="required"><br><br>
                            
                            <b>New Password: </b> <br>
                            <input name="newPassword" type="password" id="newPassword" required="required"><br><br>
                                
                            <b>Retype Password: </b> <br>
                            <input name="retypePassword" type="password" id="retypePassword" required="required"><br><br>
                               
                            
                            <input name="accountId" type="text" id="accountId" value="<?php echo $displayMain['id']?>" hidden="true"><br><br>   
                               
                                <hr>
                            <input type="submit" id="submit" name="submit" value="Submit">
                               
                               </center>
                            </form><br><br><br>      
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
        .updateForm {
            
           margin: auto;
  width: 80%;
  border: 3px solid black;
  padding: 10px;
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
