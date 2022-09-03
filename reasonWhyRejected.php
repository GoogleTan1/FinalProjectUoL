<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Why am I rejected?</title>

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

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Rejected Documents</h2>
        </div>
      </div>
    </div>
  </section>
<center>
  <section style="width: 50%; text-align: left;">
    
      <br>
            
          
          <p>
          There may be a certain reason why your documents are rejected. If you are here, you may have encountered a rejected document with the following reasons. However if the reason below did not apply to you, please contact us with the following<br><br>
        <b>Email title: Rejected Documents</b><br>
         - Organisation name<br>
         - Username<br>
         - Email address
         
          <br><br>
              
          We will <b>NOT</b> ask for your password. If there are any case of a request for your password, please <b>DO NOT</b>reply to that request and report the matter to us immediately.<br><br> 
          </p>
      
         
          
              <b><u>1.1. Submitted documents format</u></b><br>
<p>
<b>PDF submitted did not clearly state the following:</b><br>
- Proof of registration with ACRA or;<br>
- Proof of registration with a government website and;<br>
- Organisation registration number and;<br>
- Organisation Contact Number
    
    
    <br><br>  
</p>
      

<b><u>1.2. Legitimacy of submitted documents</u></b><br>
<p>
<b>The staff of Project FundMe may have contacted the relevant authorities to verify the legitimacy of the submitted documents and discovered one or more of the following:</b><br>
- The organisation is not registered with ACRA<br>
- The organisation registration number is not legitimate<br>
- The organisation does not comply with standards from <a href="../codeOfPractice.php">Code of practice</a><br>
- The organisation is not a charitable organisation<br>
- Submitted documents has been falsified
    
    
    <br><br>  
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
