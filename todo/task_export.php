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
	/*
	$file_handler = new FileHandler();
	$file_handler->read_file($_POST);
	$file_handler->export();
	*/

	if(isset($_POST['export_data'])){
	  include('connect_to_database.php');
	  $user_id = $_SESSION['login_id'];
	  header('Content-Type: text/csv; charset=utf-8');
	  ob_end_clean();  
      header('Content-Disposition: attachment; filename=data.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Id', 'TaskName', 'DueDate'));  
      $sql = "SELECT user_id,task_name,due_date FROM my_tasks WHERE user_id='$user_id'";  
      $result = $connection->query($sql); 
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
	  exit(0);
	}
	?>
</body>
</html>