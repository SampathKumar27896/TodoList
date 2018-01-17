<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

  .change_green{
    background-color: "#00ff00";
  }

</style>
<script src='welcome.js'></script>
</head>
<body>
	<table>
  <tr>
  	
    
    <th>UserId</th>
    <th>TaskName</th>
    <th>Completed</th>
    <th>Edit</th>
    <th>Delete</th>
    
    

    

    
  </tr>
<h1>Hello World</h1>
<?php
	$userName=$passWord=$original_Pass = "";
$servername = "localhost";
$username="root";
$password ="";
$column_name="";
$total_tasks = "";
$row = $_POST['butId'];
$dbname = "sample_database";


$connection = new mysqli($servername,$username,$password,$dbname);



if($connection->connect_error){
	die("Connection Failed:".$connection->connect_error);
}

///
$task ="";
$user_id = $_SESSION['login_id'];

if($_SERVER["REQUEST_METHOD"]== "POST"){
	
}
    
	$sql = "delete from  my_task where id=$row";
	if ($connection->query($sql) !== TRUE) {
    
    echo "Error: " . $sql . "<br>" . $connection->error;
	}

////
$sql = "select * from my_task where UserId=$user_id;";
		$result = $connection->query($sql);
		if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        if($row['task_completed']==1){
                echo '<script>Complete('.$row['id'].');</script>////';
        }
        echo "<tr id='row{$row['id']}'><td>{$row['UserId']}</td>
        <td >{$row['TaskName']}</td>
        <td id='sample'>{$row['task_completed']}<input type='button' value='Complete' id={$row['id']} onclick='Complete({$row['id']})'></td>
        <td>{$row['task_edit']}<input type='button' value='Edit' id={$row['id']} onclick='Edit({$row['id']})'></td>
        <td>{$row['task_delete']} <input type='button' name='delete' id='delete' value='Delete' onclick='delete_data({$row['id']})' ></td></tr>
      
 \n";
 	}
 }
///


	//echo $_POST['butId'];

?>
</body>
</html>