<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Code of Practice</title>

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
          <h2>Code of Practice</h2>
        </div>
      </div>
    </div>
  </section>
<center>
  <section style="width: 50%; text-align: left;">
    
      <br>
            This information is provided by Charities Gov SG. As we're a platform to facilitate between users and organisation, we'll include them here for reference. Please click <a href="https://www.charities.gov.sg/Pages/Fund-Raising/Use-of-OFR-and-CFR/Code-of-Practice-for-Online-Charitable-FR.aspx#">here</a> for more info.
          <h2>Code of Practice for Online Charitable Fund-Raising Appeals</h2><br>
          <p>
          
              The Code advocates the following best practices:<br><br>

              <b>(A)</b> that subscribers to the Code will put in place systems, processes and procedures to ensure that user information is kept safe and secure and that it remains accessible in the event that the subscriber ceases to operate;<br><br>

              <b>(B)</b> that subscribers will ensure transparency on funds raised and that the public can freely access the following information on the subscribers’ crowdfunding platforms:<br><br>
              
              <b>i.</b> regular updates of funds collected by virtue of any charitable fund-raising appeal conducted on the crowdfunding platforms while the appeal is ongoing;<br>
              <b>ii.</b> the total funds collected after a charitable fund-raising appeal has ended;<br>
              <b>iii.</b> maintain proper records of donations received;<br>
              <b>iv.</b> information of past, present and ongoing charitable fund-raising appeals;<br>
              <b>v.</b> subscribers will ensure that the Terms and Conditions applicable to a charitable fund-raising appeal are published on the crowdfunding platform for public access, with clear explanations on:<br>
              &nbsp;&nbsp;&nbsp;- how the donation process works;<br>
              &nbsp;&nbsp;&nbsp;- the duties and responsibilities of the subscribers;<br>
              &nbsp;&nbsp;&nbsp;- the due diligence that has been undertaken by the subscribers; and<br>
              &nbsp;&nbsp;&nbsp;- the nature and amount of fees and charges which apply;<br><br>
              
              <b>(C)</b> that subscribers require the persons conducting charitable fund-raising appeals (hereinafter referred to as “fund-raisers”) using the subscribers’ crowdfunding platforms to complete a declaration of compliance with the requirements under the Charities Act of Singapore relating to charitable fund-raising appeals, in such terms as may be proposed by the COC in consultation with the subscribers;<br><br>

              <b>(D)</b> that subscribers put in place systems and processes for early fraud and mismanagement detection and to ensure legitimacy of appeals, such as:<br><br>
              
              <b>i.</b> development and application of a verification process of personal identification of fund-raisers and beneficiaries via submission of documents to substantiate the appeal;<br>
              <b>ii.</b> development and application of policies and procedures for detection of more sophisticated attempts at fraud; and<br>
              <b>iii.</b> regular reviews and testing of policies and procedures and prompt fixing of flaws as they become known;<br><br>
              
              <b>(E)</b> that subscribers make available on their crowdfunding platforms the descriptions of the general risks related to donations made via such platforms;<br><br>

              <b>(F)</b> that subscribers evaluate risks associated with Money Laundering and Terrorist Financing (with reference to the guidance issued by the COC in May 2015 titled “<a href="https://www.charities.gov.sg/_layouts/15/download.aspx?SourceUrl=/PublishingImages/Fund-Raising/Use-of-OFR-and-CFR/Documents/AgainstMoneyLaunderingTerroristFinancing-May-2015.pdf">Protecting Your Charity Against Money Laundering and Terrorist Financing</a>”, as amended from time to time) and have in place adequate systems, processes and procedures to address such risks; and<br><br>

              <b>(G)</b> that subscribers liaise closely with the COC and co-operate on the conduct of periodic audits and reviews of the subscribers’ systems and processes to ensure they are in accordance with the Code.<br><br>
              
              
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
