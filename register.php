<!DOCTYPE html>






<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Register</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

  </head>

<body onload="disableSubmit()">

   

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
          <h2>Register</h2>
        </div>
      </div>
    </div>
  </section>

  <section>
  
      <br>
      
                            <form action="check/checkRegister.php" method="post">
                                <center>
                             <?php if(isset($_GET['id'])) // error messages
                            {
	                           	$id = $id = $_GET['id'];
	                           	
	                           	if ($_GET['id'] == '1')//Username exists
	                           	{
	                           		echo '<b style="color: red;">Username already exists</b>';
                                }
                                else if ($_GET['id'] == '2')//Email exists
	                           	{
	                           		echo '<b style="color: red;">Email already exists</b>';
                                }
                                else if ($_GET['id'] == '3')//Both email and username exists
	                           	{
	                           		echo '<b style="color: red;">Both Email and Username already exists</b>';
                                }
                                else if ($_GET['id'] == '4')//Organisation name cannot be blank
	                           	{
	                           		echo '<b style="color: red;">Organisation Name must not be empty</b>';
                                }
                                
	                           }
		                     ?>   
                            <br>
                            Username:<br><input name="username" type="text" id="username" required="required"><br><br>
                            Password:<br><input name="password" type="password" id="password" required="required"><br><br>
                            Retype Password:<br><input name="retypePassword" type="password" id="retypePassword" required="required"><br><br>
                            Email Address:<br><input name="email" type="email" id="email" required="required"><br><br>
                            <input type="checkbox" id="regAsOrg" name="regAsOrg" value="registerAsOrganisation" onclick="regAsOrgFunction()"> Register As Organisation <br><br>
                                    
                            <label id = "orgName" style="display: none">Organisation Name:</label>
                            <input name="organisation_name" type="text" id="organisation_name" style="display: none" placeholder="eg. ABC Pte Ltd">   
                            </center>

                               <br>
                                <center>
                                <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> I have read and agree with the <a href="../tos.php" target="_blank">Terms of Service</a><br>
                            <input type="submit" value="Register!" id= "submit" onclick = "return check();"></center>
                            </form>
            
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
    <script type="text/javascript">
    function check()
    {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var firstPassword = document.getElementById('password');
        var retypePassword = document.getElementById('retypePassword');
        var emailText = document.getElementById('email');
        if(firstPassword.value !=  retypePassword.value)
            {
                alert("Both passwords must match");
                return false;
            }
        
        if (input.value.match(validRegex)) 
            {
                return true;
            } 
        else 
            {
                alert("Invalid email address!");
                return false;
            }
    }
    
    function regAsOrgFunction() {
        var checkBox = document.getElementById("regAsOrg");
        if (checkBox.checked == true){
            orgName.style.display = "block";
            organisation_name.style.display = "block";
            industryLabel.style.display = "block";
            industryType.style.display = "block";
            dailyLimitLabel.style.display = "block";
            dailyLimit.style.display = "block";
            
        } else {
            orgName.style.display = "none";
            organisation_name.style.display = "none";
            industryLabel.style.display = "none";
            industryType.style.display = "none";
            dailyLimitLabel.style.display = "none";
            dailyLimit.style.display = "none";
        }
    }
    
    
    function disableSubmit() {
  document.getElementById("submit").disabled = true;
 }

  function activateButton(element) {

      if(element.checked) {
        document.getElementById("submit").disabled = false;
       }
       else  {
        document.getElementById("submit").disabled = true;
      }

  }
    
    
</script>
</body>


</html>
