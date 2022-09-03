<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - ABout Us</title>

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

  <!-- Header Area Start -->
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
  <!-- Header Area End  -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>About Us</h2>
        </div>
      </div>
    </div>
  </section>
<center>
  <section style="width: 50%; text-align: left;">
    
      <br>
            
          <h2>About Project Fund Me</h2>
          <p>
              Project Fund Me was started in 2022 by a student named "Chan Gang Yi" in University of London, Computer Science (Web and Mobile Development). In this project, 
              the student created a website to facilitate a one-stop platform between government/non-government and members of public to make donations as seemlessly as possible.<br><br>
              
              As donation scams are increasing in Singapore, this website serves a purpose to migitate donation scams and also educate members of public to stay away from donation scams. <br><br>
 
          </p>
      
          <h2>The Experience</h2>
          <p>
              The website consists of two primary roles which is explained below:<br><br>
              <b><u>Members of Public</u></b><br>
              Members of public may view and make a donation to any of the ongoing appeals that is shown in this website. The donation will be made via bank transfers with their own banks to the account number stated by the organisations. The member of public is then requested to
              upload a transaction proof to the organisations for approval before the transaction is complete. As we value the privacy of each and every members of public, all donations may be made without an account. However if the member of public decides to have a list of donation history, they are required to create an account with minimal personal information.<br><br>
              
              <b><u>Organisations</u></b><br>
              All organisations who wishes to start an appeal campaign are <b>REQUIRED</b> to create an organisation account to facilitate the process of starting an appeal. The organisations are also required to submit a proof of authenticity upon creating an organisation account
              for the website admin approvals. This is to reduce any fake organisations starting a non-existence appeal.<br><br>
 
          </p>
      
      <h2>FAQ</h2>
          <p>
              <b><u>How do I make a donation?</u></b><br>
              You may visit any ongoing campaigns that are stated in this website to view the details of the appeal before making a donation. You are required to make a bank transfer to the stated bank account by the organisation and upload a screenshot of the transaction for the organisation
              approval.<br><br>
              
              <b><u>How do I know if the organisation is legitimate?</u></b><br>
              All organisations are <b>REQUIRED</b> to upload a proof of authenticity for website admin approvals before they can start an appeal. The proof of authenticity will be carefuly reviewed by the website admin before approving the organisation. This is is reduce any fake
              organisations starting a non-existence appeal. Project Fund Me will monitor closely with all organisations to ensure that they are in accordance with the "<a href="../tos.php">Terms of Service</a>".<br><br>
              
              <b><u>How do I know if the transaction is received by the organisation?</u></b><br>
              All transaction are tagged with a transaction number and key. You may use this information to track the status of the transaction by keying it in the <a href="searchTransaction.php?id=search">"Search Transaction"</a> page. Alternatively if you have an account registered with us,
              you may visit the "Donation History" tab under your profile to view the status of the transaction. <br><br>
              
              
 
          </p>
          
          
             
          
         
      
      
                        
            
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
