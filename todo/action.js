
    function date_setting(){
            //alert("function called");
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!

            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd;
            } 
            if(mm<10){
                mm='0'+mm;
            } 
            var today = yyyy+'-'+mm+'-'+dd;
            
            document.getElementById("date_set").min = today; 
    }
    function calling(){
        var x = document.getElementById("snackbar")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
    }
    function pass_to_edit(){

        var id = document.getElementById('row_id');
        var task_name = document.getElementById('task_name');
        var due_date = document.getElementById('due_date');
        //alert(task_name.innerHTML+due_date.innerHTML+"....."+id.innerHTML);
        $('#edit_task_id_box').val(id.innerHTML);
        $('#edit_task_box').val(task_name.innerHTML);
        $('#date_set').val(due_date.innerHTML);
        $('#data_id').val(id.innerHTML);
        $('#edit_task_id_box').attr('disabled','disabled');
    }
    function complete(data){
        
        
        $('#record'+data).css("background-color","#001601");

        $('#check'+data).css("background-color","#001601");
        $('#check'+data).css("border-width","0px");
        $('#edit'+data).css("background-color","#001601");
        $('#edit'+data).css("border-width","0px");
        $('#delete'+data).css("background-color","#001601");
        $('#delete'+data).css("border-width","0px");
        
        

    }
    function validate_form() {
   
        var x = document.forms["edit_form"]["edit_task_box"].value;
        var y = document.forms["edit_form"]["edit_date"].value;
        


        if (x == "" || y == "") {
            alert("Please enter valid task or date.");

            return false;
        }
    }
    function validate_form_add() {
   
    var x = document.forms["add_form"]["add_task"].value;
    var y = document.forms["add_form"]["due_date"].value;
    


    if (x == "" || y == "") {
        alert("Please enter valid task or date.");

        return false;
    }
}

    function validate_form_register() {
   
    var x = document.forms["register_form"]["name"].value;
    var y = document.forms["register_form"]["password"].value;
    var z = document.forms["register_form"]["re_password"].value;
    
    

    if (x == null || y == null || z==null) {
        alert("Please fill all the fields.");
        return false;
    }
        
    if( y != z){
        alert("ji");
        alert("Passwords must be same.");
        return false;
    }
}


