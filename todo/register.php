<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body class='login_body'>
<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" name="register_form" onsubmit="return validate_form_register()">
      <img src="images/heptagon-logo.png" alt="Heptagon">
      <label id="enter_username">Enter Username</label><br>
      
      <input type="text" placeholder="username" name='name'/>
      <label id="enter_password">Enter Password</label><br>
      <input type="password" placeholder="password" name='password'/>
      <label id="enter_password">Re-enter Password</label><br>
      <input type="password" placeholder="password" name='re_password'/>
      <input type='submit' name='sign_up' id='sign_up_button' value='Sign Up'>

      <p class="message">Already registered? <a href="login.php">Sign in</a></p>
    </form>
  </div>
</div>
<?php
		
		include('connect_to_database.php');

		
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_up'])){
			$user_name = $_POST['name'];
			$password = $_POST['password'];
			$re_password = $_POST['re_password'];
			
			
			if(empty($user_name) || empty($password) || empty($re_password)){
				echo "<script>alert('Please fill all the fields');</script>";
			}
			if($password != $re_password){
				echo "<script>alert('Password must be same');</script>";
			}
			
			if(!empty($user_name) && $password === $re_password){
				$sql="SELECT user_name FROM login WHERE user_name='$user_name';";
				$result = $connection->query($sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$count = mysqli_num_rows($result);


				if($count >= 1){
					 echo "<script>alert('user name exists..');</script>";
					 
					
					
				}
				else{
					$sql="INSERT INTO  login(user_name,password)VALUES('$user_name','$password');";
					if($connection->query($sql) !== TRUE) {
		        		echo "Error: " . $sql . "<br>" . $connection->error;
		      		}
		      		else
		      			header("location: login.php");
		      	}
	      	}

		}
		

		

		


	
?>
</body>
</html>