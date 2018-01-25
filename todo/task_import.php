<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
	
	</script>
</head>
<body>

<?php
include('connect_to_database.php');
if(isset($_POST["import_data"])){
 		echo "Please upload a csv file";
 		$user_id = $_SESSION['login_id'];
		echo $file_name=$_FILES["file"]["tmp_name"];
 
 		
		 if($_FILES["file"]["size"] > 0)
		 {
 
		  	$file = fopen($file_name, "r");
	         while (($task_data = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
 				
	           $sql = "insert into my_tasks (`user_id`, `task_name`, `due_date`, `task_edit`) 
	            	values('$user_id','$task_data[0]','$task_data[1]',0)";
	         
	          $result = $connection->query($sql);

				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"display_data.php\"
						</script>";
 
				}
 
	         }
	         fclose($file);
	         	         echo "<script type=\"text/javascript\">
									alert(\"CSV File has been successfully Imported.\");
									window.location = \"display_data.php\"
								</script>";
 
 
 
			 
			mysql_close($connection); 
 
 
 
		 }
	}	 
?>

</body>
</html>