

function delete_data(data){
  var d = data;
  
  

          $.ajax({

            type: 'post',
            url: 'welcome3.php',
            data: {butId:d},
            success: function (data) {
              //alert('form was submitted');
              console.log(data);
              $('#div1').html(data)
            }
          });

        

}
function Edit(data){
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
      //$("#row"+data).addClass("change_green");
      $.ajax({

            type: 'post',
            url: 'welcome5.php',
            data: {butId:data},
            
            
          });

          

}
function sample(){
    $(function () {
      //  alert("Function called");
        $('#form2').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'import.php',
            data: $('form').serialize(),
            success: function (data) {
              //alert('form was submitted');
              console.log(data);
              $('#div1').html(data)
            }
          });

        });

      });
  }