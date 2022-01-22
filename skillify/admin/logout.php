<?php
include('dbcon.php');
mysqli_query($conn,"update user_log set logout_Date = NOW() where user_id = '$session_id' ")or die(mysqli_error());

 session_destroy();
header('location:login.php'); 
?>