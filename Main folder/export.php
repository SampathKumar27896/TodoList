<?php

	session_start();

?>
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
$set_data='';

$connection = new mysqli($servername,$username,$password,$dbname);



if($connection->connect_error){
	die("Connection Failed:".$connection->connect_error);
}
$user_id = $_SESSION['login_id'];
//echo "The user id is:$user_id<br>";
$sql = 'select UserId,TaskName from my_task where UserId=1';
if(!$connection->query($sql))
	echo "Error: " . $sql . "<br>" . $connection->error;
$result = $connection->query($sql);

$column_header = '';  
$column_header = "UserID"."\t"."Task Name"."\t"."<br>";  
  
$set_data = '';  
  
while ($rec = mysqli_fetch_row($result)) {  

    // $rowData = '';  
    $row_data = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $row_data .= $value;
  }
  $set_data .= trim($row_data)."\n";
      
     
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
 echo ucwords($column_header) . "\n" . $set_data . "\n";  
//echo ucwords($columnHeader) . "\n" . $set_data . "\n";  

	?>

</body>
</html>