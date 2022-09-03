<!-- Checks if Login START-->
<?php 
session_start();
if (isset($_SESSION['MM_Username']))
{
    
    $uname_i = $_SESSION['MM_Username']; //SETS $uname_i VARIABLE TO LOGGED IN USERNAME 
    $conn = mysqli_connect("localhost","root","","finalprojectdb");//DATABASE CONNECTION
    $sql = "SELECT * FROM accounts WHERE username = '$uname_i' ";//SELECT EVERYTHING FROM ACCOUNTS TABLE WHERE USERNAME IS LOGGED IN USERNAME
    $final = mysqli_query ($conn, $sql);//TABLE CONNECTION
    $display = mysqli_fetch_assoc($final);//DISPLAY RESULTS
    
    
	?>
<ul>
 <li style='color:white;'><b>Logged in as:</b> <?php echo $display['username'] ?></li>
 <li><a href="../check/checkLogout.php"><b>[Logout]</b></a></li>
</ul>

<?php
}
else
{
    
?>
<ul>
 <li><a href="login.php"><b>Login</b></a></li>
 <li><a href="register.php"><b>Register</b></a></li>
</ul>
<?php
}
?>
<!-- Checks if Login END-->

