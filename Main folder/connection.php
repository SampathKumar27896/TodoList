<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php



		$userName=$passWord=$original_Pass = "";
		$servername = "localhost";
		$username="root";
		$password ="";
		$column_name="";
		$total_tasks = "";

		$dbname = "sample_database";


		$connection = new mysqli($servername,$username,$password,$dbname);



if($connection->connect_error){
	die("Connection Failed:".$connection->connect_error);
}

//echo "Welcome home: ".$_SESSION['login_user']."Your Id is:".$_SESSION['login_id'];

//$sql="select Id from login where UserName='$userName' and passWord='$passWord'"



?>
</body>
</html>