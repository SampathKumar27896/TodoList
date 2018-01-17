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
$columnHeader =''; 
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

$columnHeader = '';  
$columnHeader = "UserID"."\t"."Task Name"."\t"."<br>";  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($result)) {  

    // $rowData = '';  
    $rowData = '';
  foreach($rec as $value)
  {
    $value = '"' . $value . '"' . "\t";
    $rowData .= $value;
  }
  $setData .= trim($rowData)."\n";
      
     
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
 echo ucwords($columnHeader) . "\n" . $setData . "\n";  
//echo ucwords($columnHeader) . "\n" . $set_data . "\n";  

	?>

</body>
</html>