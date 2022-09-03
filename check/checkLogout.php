<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Check logout</title>
</head>

<body>
<?php
session_start(); //get the session
session_unset(); //remove session variables
session_destroy(); //destroy the session
header("Location:../index.php");
?>
</body>
</html>