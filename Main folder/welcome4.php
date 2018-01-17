<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
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
</style>
<body>
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


	//echo "Successful";
if (isset($_POST['butId']))    
{    
	
     $rows = $_POST['butId'];     // Instructions if $_POST['value'] exist    
     echo "$rows";

if($_SERVER["REQUEST_METHOD"]== "POST"){
	$sql = "select TaskName from  my_task where id=$rows;";
	

		$result = $connection->query($sql);
		$row = $result->fetch_assoc();
        echo "<p id='ss'>{$row['TaskName']}</p>";

    
    
 
	}
}

$sql = "delete from  my_task where id=$rows";
	if ($connection->query($sql) !== TRUE) {
    
    echo "Error: " . $sql . "<br>" . $connection->error;
	}

////
$sql = "select * from my_task where id=$rows";
		$result = $connection->query($sql);
		if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<tr id='row{$row['id']}'><td>{$row['UserId']}</td>
        <td>{$row['TaskName']}</td>
        <td>{$row['task_completed']}<input type='button' value='Complete' id={$row['id']} onclick='Complete({$row['id']})'></td>
        <td>{$row['task_edit']}<input type='button' value='Edit' id={$row['id']} onclick='Edit({$row['id']})'></td>
        <td>{$row['task_delete']} <input type='button' name='delete' id='delete' value='Delete' onclick='delete_data({$row['id']})' ></td></tr>
      
 \n";
 	}
 }
?>

</body>
</html>