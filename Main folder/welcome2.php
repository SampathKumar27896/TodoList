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
	<h1>Hello</h1>
<div>
    <form  method ="post">
	<table>
  <tr>
  	
    
    <th>UserId</th>
    <th>TaskName</th>
    <th>Completed</th>
    <th>Edit</th>
    <th>Delete</th>
    
    

    

    
  </tr>
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

///
$task ="";
$user_id = $_SESSION['login_id'];

if($_SERVER["REQUEST_METHOD"]== "POST"){
	$task = $_POST["task"];

if(!empty($task)){
	$sql = "insert into my_task(UserId,TaskName,task_completed,task_edit,task_delete)values('$user_id','$task',0,0,0)";
	if ($connection->query($sql) !== TRUE) {
    
    echo "Error: " . $sql . "<br>" . $connection->error;
	}
}

///
	
	
		$sql = "select * from my_task where UserId=$user_id;";
		$result = $connection->query($sql);
		if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<tr id='row{$row['id']}' class=''><td>{$row['UserId']}</td>
        <td>{$row['TaskName']}</td>
        <td><input type='button' value='Complete' id={$row['id']} onclick='Complete({$row['id']})'></td>
        <td><input type='button' value='Edit' id={$row['id']} onclick='Edit({$row['id']})'></td>
        <td> <input type='button' name='delete' id='delete' value='Delete'   onclick='delete_data({$row['id']})' ></td></tr>
      
 \n";
        }
}   }


$connection->close();
//echo "Hello World".$_POST['id'];


?>
<div id="div1">
</div>
</body>
</html>