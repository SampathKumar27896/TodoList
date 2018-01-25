<?php
    
        session_start(); 
     
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src='action.js'></script>
</head>



 <?php
  // include('display_data.php');
  include('connect_to_database.php');

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_button'])){
	  //echo "<script>alert('hi');</script>";
	  $user_id = $_SESSION['login_id'];
	  $button_id = $_POST['row_id'];
	  echo "The button id:".$button_id;
	  $sql = "DELETE FROM my_tasks WHERE id=$button_id";
	  if($connection->query($sql) !== TRUE) {
	    echo "Error: " . $sql . "<br>" . $connection->error;
	  }
	  else{
	    	header("location: display_data.php");
	      
	  }
    
     
    
      
  }
  
    
     
    
      
  
    
  
  
  include('display_data.php');

?>
<div>

</div>
</body>
</html>