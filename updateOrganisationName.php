<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Update Organisation Name</title>

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

$uname_i = $_SESSION['MM_Username'];
$conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
              
//PROFILE DISPLAY
$sqlMain = "SELECT * FROM accounts INNER JOIN accounts_type ON accounts.account_type = accounts_type.id WHERE username = '$uname_i' ";//SELECT EVERYTHING FROM ACCOUNTS AND ACCOUNTS_TYPE TABLE WHERE USERNAME IS LOGGED IN USERNAME
$finalMain = mysqli_query ($conn, $sqlMain);//TABLE CONNECTION
$displayMain = mysqli_fetch_assoc($finalMain);//DISPLAY RESULTS

//ORGANISATION DISPLAY
$organisationOwner = $display['id'];//SETS $organisationOwner VARIABLE TO ACCOUNT ID        
$sqlOrg = "SELECT * FROM organisations WHERE organisationOwner = '$organisationOwner' "; //SELECT EVERYTHING FROM ORGANISATIONS TABLE WHERE OWNER IS ORGANISATION OWNER
$finalOrg = mysqli_query ($conn, $sqlOrg);//TABLE CONNECTION
$displayOrg = mysqli_fetch_assoc($finalOrg);//DISPLAY RESULTS
              
?>
<!-- Check if logged in END -->
            
          <h2>Update Organisation Name <a href="profile.php">(Back)</a></h2><br>
              
              <?php 
    
            if ($displayMain['id'] != '1')
            {
                header("Location:login.php?id=3");
            }
              ?>
              
              
        </div>
      </div>
    </div>
  </section>

  <section>
<center>
      <!-- Wrong password display -->                     
        <?php if(isset($_GET['id']))
	{
		$id = $id = $_GET['id'];
		
		if ($_GET['id'] == '1') //Update of organisation name is unsuccessful
		{
			echo '<b style="color: red;">Update Unsuccessful, Try Again</b>';
		}
		else if ($_GET['id'] == '2')//Update of organisation name is successful
		{
			echo '<b style="color: Green;">Update Successful</b>';
		}
        else if ($_GET['id'] == 'mainPage')//return to main page
		{
			echo '<br>';
		}
        
	}
		?></center>
                            
                            <form action="check/checkUpdateOrganisationName.php" method="post" class="updateForm">
                            <font color="red">Please note that your organisation name <b>MUST</b> be the same as the organisation name in the uploaded proof of authencity, admin reserves the right to cancel the approval if there is a mismatched organisation name. <br><br></font>

                                <hr>
                                
                           
                            <b>Organisation Name: </b> 
                            <input name="organisationName" type="text" id="organisationName" required="required"  value="<?php echo $displayOrg['organisationName'] ?>"><br><br>
                            <input type="checkbox" id="agreeNameIsCorrect" name="agreeNameIsCorrect" value="agreed" onclick="agreeNameIsCorrectFunction()"> I confirm that the name stated is the same as the uploaded proof of authencity. 
                                
                            <input name="organisationId" type="text" id="organisationId" style="width: 350px;" hidden=true value="<?php echo $displayOrg['id'] ?>"> <!-- Organisation ID hidden to post -->
                                <br><br>    
                                <hr>
                            <input type="submit" id="submit" name="submit" value="Submit"  disabled=true>
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
        
         function agreeNameIsCorrectFunction() {
        var checkBox = document.getElementById("agreeNameIsCorrect");
        if (checkBox.checked == true){
            document.getElementById("submit").disabled = false;
            
        } else {
           document.getElementById("submit").disabled = true;
        }
    }
        
        
    </script>
</body>


</html>
