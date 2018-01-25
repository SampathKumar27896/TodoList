<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body class='login_body'>
<div class="login-page">
  <div class="form">
    <!-- <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form> -->
    <form class="login-form" method="post">
      <img src="images/heptagon-logo.png" alt="Heptagon">
      <input type="text" placeholder="username" name='name'/>
      <input type="password" placeholder="password" name='password'/>
      <button>Login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
</div>
<?php
		
		include('connect_to_database.php');

		
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			$user_name = $_POST['name'];
			$password = $_POST['password'];
		}
		$_SESSION['user_name'] = $user_name;
		$sql="SELECT Id FROM login WHERE user_name='$user_name' AND password='$password'";
		$result = mysqli_query($connection,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$user_id = $row['Id'];
		$_SESSION['login_id'] = $user_id;
		$count = mysqli_num_rows($result);


		if($count == 1){
			header("location: display_data.php");
		} 

		


	
?>
</body>
</html>