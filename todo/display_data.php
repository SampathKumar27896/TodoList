<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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

	<nav class="navbar navbar-default">
		<div class="container-fluid">			
			<div class="navbar-header">
			  <a class="navbar-brand" href="https://heptagon.in"><img src="images/heptagon-logo.png" height= "30" alt="Heptagon" ></a>
			</div>
			<ul class="nav navbar-nav">
			</ul>
			<a href="login.php" style="color:white;float:right">Logout</a>
		</div>
	</nav>

<div class="form_horizontal">

		<form  action="task_import.php" method="post" name="upload_excel" enctype="multipart/form-data" id='form1'>
			<p id='import_message'>Import tasks to your list by choosing a CSV file</p>	
			<input type="file" name="file" id="file_upload" class="input-large">
			<button type="submit" id="upload_submit" name="import_data" >Upload</button>
							
		</form>  
		<div>
			<form  action="task_export.php" method="post" name="download_excel" enctype="multipart/form-data" id='form2'>
			<p id='import_message'>Download tasks as a CSV file</p>
			<button type="submit" id="download_submit" name="export_data" >Download</button>
		</form>
		</div>
	</div>		
	<div>
	    
			<table>
	  			<tr>
	  				<th><a href="tasks.php"><img src="images/add.png"></a></th>
	  				<th>Id</th>
				    <th>UserId</th>
				    <th>TaskName</th>
				    <th>Due Date</th>
				    <th>Completed</th>
				    <th>Edit</th>
				    <th>Delete</th>
				    
				</tr>
				<?php
					include('connect_to_database.php');
					$user_id = $_SESSION['login_id'];
					$sql = "SELECT * FROM my_tasks WHERE user_id=$user_id;";
					$result = $connection->query($sql);
					if ($result->num_rows > 0){
    					while($row = $result->fetch_assoc()) {
						    echo "<tr id='record{$row['id']}'>
					        	  <td></td>
					        	  <td>{$row['id']}</td>
					        	  <td>{$row['user_id']}</td>
					        	  <td>{$row['task_name']}</td>
					        	  <td>{$row['due_date']}</td>
					        	  <td><form method='post' action='task_complete.php'> 
					        	  	   <button type='submit' id='check{$row['id']}' name='complete_button' class='check_button'><img src='images/check.png'></button>
					        	  	   <input type='hidden' name='row_id' value='{$row['id']}'>
 									   </form>
					        	  </td>
					        	  <td><form method='post' action='task_edit.php'> 
					        	  		<button type='submit' name='edit_button' class='edit_button' id='edit{$row['id']}'><img src='images/edit.png'></button>
      									<input type='hidden' name='row_id' value='{$row['id']}'>
 										</form></td>
					        	  <td><form method='post' action='delete_data.php'> 
					        	  		<button type='submit' name='delete_button' class='delete_button' id='delete{$row['id']}'><img src='images/delete.png'></button>
      									<input type='hidden' name='row_id' value='{$row['id']}'>
 										</form>
 								   </td>
					        	   </tr>\n";
					        if($row['task_edit']==1){
					                echo '<script>complete('.$row['id'].');</script>';
					        }
				        }
				    }
				?>
			</table>
		</div>
			
</body>
</html>