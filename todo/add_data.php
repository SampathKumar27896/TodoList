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
<!-- Modals -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Task Successfully added
      </div>
    </div>
  </div>
</div>

<body class='tasks_bg'>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="https://heptagon.in"><img src="images/heptagon-logo.png" height= "30" alt="Heptagon" ></a>

    </div>
    <ul class="nav navbar-nav">
      
      
    </ul>
    <a href="login.php" style="color:white;float:right">Logout</a>
  </div>
</nav><!--$_SERVER["PHP_SELF"] -->
<div id='snackbar'>Some text some message..</div>
<div>
  <form  method='post' name='add_form' onsubmit="return validate_form_add()">
    <label id='add_task_label'>Add your Tasks here</label><br> 
    <label id='task_name_label'>Task name:</label><br><input type="text" name="add_task" id="add_task"><br>
    <label id='due_date_label'>Due date:</label><br><input type='date' id='date_set'  min="2018-01-21" name="due_date" max="" onclick="date_set()"></input><br>
    <input type="submit" name="add_task_button" id="add_task_button" value="Add Task" >

  </form>
 </div> 
 <?php
  // include('display_data.php');
  include('connect_to_database.php');

  if($_SERVER["REQUEST_METHOD"] == "POST" ){
    
    $user_id= $_SESSION['login_id'];
    $due_date  = $_POST['due_date'];
    $task = $_POST['add_task'];
    
    if(empty($due_date) || empty($task)){
      echo "<script>alert('please fill all the fields');</script>";
    }
    if(!empty($task) && !empty($due_date)){
         $sql = "INSERT INTO my_tasks(user_id,task_name,due_date,task_edit)VALUES
      ('$user_id','$task','$due_date',0)";
      if($connection->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
      }
      else{
          
          echo "<script>calling();</script>";
          header("location:display_data.php");
          

      }
    }
    
  }
  
  

?>
<div>

</div>
</body>
</html>