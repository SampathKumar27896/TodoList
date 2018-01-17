<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style>
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
}

.submit {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

</style>
</head>
<body>
<!-- Form --> 
<form  method ="post">

Name:<input type="text" name="fname"><br>
Password:<input type="Password" name="fpassword"><br>

<input type="submit" name="submit" class="submit">

<div id="error"></div>

</form>

<!-- php -->

<?php
if(isset($_POST['submit'])) {
	$userName=$passWord=$original_Pass = "";
	$servername = "localhost";
	$username="root";
	$password ="";
	$dbname = "sample_database";
	$error = "Login Unseccessful";

	$connection = new mysqli($servername,$username,$password,$dbname);



	if($connection->connect_error){
		die("Connection Failed:".$connection->connect_error);
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$userName = $_POST['fname'];
			$passWord = $_POST['fpassword'];
		}

		$sql="select Id from login where UserName='$userName' and passWord='$passWord'";

		$_SESSION['login_user'] = $userName;
		
		$result = mysqli_query($connection,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$user_id = $row['Id'];
		$_SESSION['login_id'] = $user_id;
		

		$count = mysqli_num_rows($result);


		if($count == 1){
			header("location: welcome.php");
		}else{
			//echo "$error";
		}

		// function submit(){
		// 	echo "efre";
		// }

		
 
    
} 

?>



</body>
</html>