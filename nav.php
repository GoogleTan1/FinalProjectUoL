<?php 
if (isset($_SESSION['MM_Username']))//IF ACCOUNT IS LOGGED IN
{
    
    $uname_i = $_SESSION['MM_Username'];//SETS $uname_i VARIABLE TO LOGGED IN USERNAME 
    $conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
    $sql = "SELECT * FROM accounts WHERE username = '$uname_i' ";//SQL CODE, SELECT EVERYTHING FROM ACCOUNTS TABLE WHERE USERNAME IS LOGGED IN USERNAME
    $final = mysqli_query ($conn, $sql);//TABLE CONNECTION
    $display = mysqli_fetch_assoc($final);//DISPLAY RESULTS
    
    
	?>
<a href="index.php" class="logo">
                          Project FundMe
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="index.php">Home</a></li>
                          <li><a href="aboutUs.php">About Us</a></li>
                          <li><a href="codeOfPractice.php">Code Of Practice</a></li>
                          <li><a href="organisations.php">Organisations</a></li> 
                          <li><a href="contactUs.php">Contact Us</a></li>
                          <li><a href="searchTransaction.php?id=search">Search Transaction</a></li>
                          <li><a href="profile.php">My Profile</a></li>
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>

<?php
}
else//ACCOUNT IS NOT LOGGED IN
{
?>
<a href="index.php" class="logo">
                          Project FundMe
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="index.php">Home</a></li>
                          <li><a href="aboutUs.php">About Us</a></li>
                          <li><a href="codeOfPractice.php">Code Of Practice</a></li>
                          <li><a href="organisations.php">Organisations</a></li> 
                          <li><a href="searchTransaction.php?id=search">Search Transaction</a></li>
                          <li><a href="contactUs.php">Contact Us</a></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
<?php
}
?>
<!-- Checks if Login END-->