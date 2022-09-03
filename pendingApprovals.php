<!DOCTYPE html>



<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Project FundMe - Pending Approvals</title>

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
  <header class="header-area header-sticky" style="background-color: grey;">
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

  <section class="table-page">
   
             <!-- Check if logged in START -->     
 <?php
                        
if ($_SESSION['MM_Username'] == '')
{
	
}
if(isset($_GET['id']))
{
    $id = $_GET['id'];
		
}
//Check if logged in END

$uname_i = $_SESSION['MM_Username'];//SETS $uname_i VARIABLE TO LOGGED IN USERNAME 
$conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION    
              
//PROFILE DISPLAY
$sqlMain = "SELECT * FROM accounts WHERE username = '$uname_i' ";//SELECTS EVERYTHING FROM ACCOUNTS TABLE WHERE USERNAME IS LOGGED IN USERNAME
$finalMain = mysqli_query ($conn, $sqlMain);//TABLE CONNECTION
$displayMain = mysqli_fetch_assoc($finalMain);//DISPLAYS RESULT
              
//Organisation DISPLAY
$sqlPendingOrg = "SELECT * FROM accounts INNER JOIN organisations ON accounts.id = organisations.organisationOwner WHERE organisations.organisationApproved = '1' ";//SELECT EVERYTHING FROM ACCOUNTS AND ORGANISATION TABLE WHERE ACCOUNTS AND ORGANISATION MATCHES, AND ORGANISATION IS APPROVED
$finalPendingOrg = mysqli_query ($conn, $sqlPendingOrg); //DISPLAY RESULTS

if ($displayMain['account_type'] != '2') //CHECKS IF ADMIN, IF NOT RETURN TO LOGIN
{
    header("Location:login.php?id=3");
}
              
?>

      

            
          <h2>All Organisations Pending Approvals <a href="profile.php">(Back)</a></h2>           
        If you're using a mobile, you may scroll left/right to view the table.
  </section>

  <section style="overflow-x: auto;">
                       
      
     <table>
         
  <tr>
    <th>ID</th>
    <th>Organisation Name</th>
    <th>Owner</th>
    <th>Proof Of Authencity</th>
    <th><center>Actions</center></th>
  </tr>
  
      <?php 
        while($displayOrg = mysqli_fetch_assoc($finalPendingOrg))//LOOP
        {
        ?>
    <tr>
    <td><?php echo $displayOrg['id'] ?></td>
    <td><?php echo $displayOrg['organisationName'] ?></td>
    <td><?php echo $displayOrg['username'] ?></td>
    <td>
        <?php if ($displayOrg['organisationProofOfAuth'] == '') //PROOF OF AUTHENTICATION IS NOT SUBMITTED
        {
            echo 'No Proof Submitted';
        }
            else//PROOF OF AUTHENTICATION IS SUBMITTED
            { ?>
                <a style="color:'red';" href="organisationProofOfAuth/<?php echo $displayOrg['organisationProofOfAuth'] ?> " target="_blank"><b>[VIEW]</b></a></td>
            <?php }
        ?>
        
    <td>
        <center>
        <form action="check/checkApproveOrganisation.php" method="post">
        <input name="organisationId" type="text" id="organisationId" hidden=true value="<?php echo $displayOrg['id'] ?>">
        <input type="submit" id="approve" name="approve" value="Approve" onClick="return confirmApprove()">
        </form>
        <br>
        <form action="check/checkRejectOrganisation.php" method="post">
        <input name="organisationId" type="text" id="organisationId" hidden=true value="<?php echo $displayOrg['id'] ?>">
        <input type="submit" id="reject" name="reject" value="Reject" onClick="return confirmReject()">
        </form>
        </center>
  </tr>
    <?php
        }
         ?>
  
</table>
  
             
           
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
        .column {
            vertical-align: top;
            display: inline-block;
            border: 3px solid black;
            margin: 20px;
            text-align:left;
            padding-left: 10px;
            
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
             width: 70%;
             margin: 0 auto;
             overflow-x: auto;
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
    <script>

function confirmApprove()
    {
        var agree=confirm("Confirm Approve?");
        if (agree)
            return true ;
        else
            return false ;
    }
    
function confirmReject()
    {
        var agree=confirm("Confirm Reject?");
        if (agree)
            return true ;
        else
            return false ;
    }
    
    
</script>
</body>


</html>
