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
<body class='tasks_bg'>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="https://heptagon.in"><img src="images/heptagon-logo.png" height= "30" alt="Heptagon" ></a>

    </div>
    <ul class="nav navbar-nav">
      <li><a href="#" style="color:white">ListToDo</a></li>
      
      
    </ul>
  </div>
</nav>
<div>
  <form method='post'>
    <label id="edit_task_label_heading">Edit Task Here</label><br>
    <label id="edit_task_id_label">Task no:</label><br><input type='text' id='edit_task_id_box'      name='edit_task_id_box' disabled></input><br>
    <label id="edit_task_label">Edit task name:</label><br><input type="text" name="edit_task_box" id="edit_task_box"><br>
    <label id="edit_date_label">Edit due date:</label><br><input type='date' id='date_set'  min="" max="" onclick="date_set()" name='edit_date'></input><br>
    <input type='hidden' name='data_id' id='data_id' value=''>
    <input type="submit" name="ok_task_edit_button" id="ok_task_edit_button" value="Save">
  </form>
 </div>
 <div>
 <?php
      
      if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ok_task_edit_button'])){
                
                
                $row_id = $_POST['edit_task_id_box'];
                
                $task_name = $_POST['edit_task_box'];
                $due_date  = $_POST['edit_date'];
                if(!empty($task_name) && !empty($due_date)){
                  $check=1;
                  $sql = "UPDATE my_tasks SET task_name='$task_name' , due_date='$due_date' WHERE id='$row_id'";
                  $result = $connection->query($sql);
                  if($connection->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $connection->error;
                  }
                  header("location: display_data.php");

                }
                
              
      }

 ?>
</div>
</body>
</html>