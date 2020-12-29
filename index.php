<?php
require_once('config.php');
echo BURL;
# this is home screen with with logined user data  
echo "<img src=".$_SESSION['user_img']." height=300 width=500 />"."<br>";
echo $_SESSION['user_name']."<br>";
echo $_SESSION['user_email']."<br>";
echo $_SESSION['user_id']."<br>";
echo $_SESSION['user_img']."<br>";