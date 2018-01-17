

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
      $("#row"+data).addClass("change_green");


          

}
