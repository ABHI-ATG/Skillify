<?php include('header.php'); ?>
  <body id="login">
    <div class="container">

      <form id="login_form" class="form-signin" method="post">
        <h3 class="form-signin-heading"><i class="icon-lock"></i> Please Login</h3>
        <input type="text" class="input-block-level" id="usernmae" name="username" placeholder="Username" required>
        <input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
        <input name="login" class="btn btn-info" type="submit" placeholder="submit"/>
	 </form><?php
		include('dbcon.php');
		session_start();
		if (isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysqli_query($conn,"SELECT * FROM log WHERE name='$username' AND password='$password'");
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);


		if ($count > 0){
			ob_start();
			 header('Location: dashboard.php');
ob_end_flush();
		 }else{ 
		$query = mysqli_query($conn,"INSERT INTO `log`(`name`, `password`) VALUES ('$username','$password')");
		if($query){
			header('Location: dashboard.php');
		}else{
			echo "failed";
		}
		}

	}?>
    </div> 
<?php include('script.php'); ?>
  </body>
</html>