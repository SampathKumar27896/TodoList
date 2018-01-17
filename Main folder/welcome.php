<?php

	session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
  .change_green{
    background-color: "#00ff00";
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='welcome.js'></script>

<script>

/*$(function () {
		  //  alert("Function called");
        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'welcome2.php',
            data: $('form').serialize(),
            success: function (data) {
              //alert('form was submitted');
              console.log(data);
              $('#div1').html(data)
            }
          });

        });

      });


/*function Edit(data){
	var d = data;
	
		alert("hi.."+d);

          $.ajax({

            type: 'post',
            url: 'welcome4.php',
            data: {butId:d},
            
            success: function (data) {
              alert('form was submitted');
              
              html = $.parseHTML( data );
              console.log(html);
              $('#text').val(html[5].innerHTML);
            }
          });

        

}

function Complete(data){
      //alert("row"+data);
      
      $("#row"+data).css("background-color","#00ff00");
      $("#row"+data).addClass("change_green");


          

}

*/
</script>
 

</head>
<script >
  $(function () {
      //  alert("Function called");
        $('#form1').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'welcome2.php',
            data: $('form').serialize(),
            success: function (data) {
              //alert('form was submitted');
              console.log(data);
              $('#div1').html(data)
            }
          });

        });

      });
</script>
<body>

<?php



// 		$userName=$passWord=$original_Pass = "";
// 		$servername = "localhost";
// 		$username="root";
// 		$password ="";
// 		$column_name="";
// 		$total_tasks = "";

// 		$dbname = "sample_database";


// 		$connection = new mysqli($servername,$username,$password,$dbname);



// if($connection->connect_error){
// 	die("Connection Failed:".$connection->connect_error);
// }else{
// 	echo "Connection Successful<br>";
// }

//echo "Welcome home: ".$_SESSION['login_user']."Your Id is:".$_SESSION['login_id'];

//$sql="select Id from login where UserName='$userName' and passWord='$passWord'"




?>
<div>

<form  method ="post" id='form1'>

Task: <input type='text' name="task"  id="text"></textarea>

<input type="submit" name="Add" id="Add" >


</form>
</div>
<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data" id='form2'>
          
            
            
                <label>CSV/Excel File:</label>
              
                <input type="file" name="file" id="file" class="input-large">
             
 
            
          
          <button onclick='sample()' name='Import'>Upload</button>
        </form>
<?php 
	echo "Login id:....".$_SESSION['login_id'];
	
    
	?>
    
</div>


<div id="div1">

	</div>
<div id="div2">
  <a href="export.php">Download</a>
</div>
<div id='completed'>
  </div>
</body>
</html>