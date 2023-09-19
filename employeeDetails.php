
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  *{
   margin: 0;
   padding: 0;
   font-family: sans-serif;
  }
 
  
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
 background-color: #333
}

li:last-child {
 
   background-color: #333;
}

li a {
  display: block;
  color: white;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
   background-color: #333;
}
a:link, a:visited {
  color: white;
  background-color: #333;
  border-style: none;
  cursor: auto;
}

a:link:active, a:visited:active {
  color: #3c2b2b;
}

li a:hover:not(.active) {
  background-color: #cccccc;
}

.active {
  background-color: grey;
}
 </style>
<?php 
 session_start();

  if(!isset($_SESSION['email']) || $_SESSION['role']!= "Manager")
  {

    header("location:index.php");
  }


 ?>


<head>
  <ul>
  <li>
<div class="widgets_div" align="left" >
  <div class="icon_div" >
    <a class="btn btn-large btn-primary logout"   style="font-size:18px" href="manager.php">
    <span><i class="fas fa-user-tie" style="font-size:48px;">Manager</i></span>
  </div>
  <div class="text_div">
    <span> Hello:<?=$_SESSION['email'] ?></span><br>
    <span>You are a <?=$_SESSION['role'] ?></span><br>
     <span>AccountID: <?=$_SESSION['accountID'] ?></span>
  </div>
</li>
 <li style="float:right">
<div class="widgets_div">  
<a class="btn btn-large btn-primary logout" style="font-size:28px" style="vertical-align: top;"href="logout.php">
        <i class="fa fa-sign-out" aria-hidden="true">Logout</i>
</a>
<a class="btn btn-large btn-primary logout" style="font-size:28px" style="vertical-align: top;"href="manager.php">
        <i class="material-icons">&#xe317;</i>Back</i>
</a>
</li>
</ul>

 <script type="text/javascript">
  function toggleSidebar(){
   document.getElementById("sidebar").classList.toggle('active');
  }
 </script>
<html>
 <head>
  <title>Employee Details</title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1270px;
   padding:20px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }
  </style>
 </head>
 <body>
  <div class="container box">
   <h1 align="center">Employee Details</DATA></h1>
   <br />
   <div class="table-responsive">
   <br />
    <div align="right">
         <button type="button"  data-toggle="modal" data-target="#add_Employee" class="btn btn-warning">Add</button>
    </div>
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
 <th><strong>Employee ID</strong></th>
<th><strong>Name</strong></th>
<th><strong>Surname</strong></th>
<th><strong>Date of Birth</strong></th>
<th><strong>Role</strong></th>
<th><strong>Branch ID</strong></th>
<th><strong>Account ID</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>

<div id="add_Employee" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add New Employee</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
       <label>Enter Email:</label>
     <input type="email" name="email" id="email" class="form-control" />
     <br />
     <label>Enter Password:</label>
     <input type="password" name="password" id="password" class="form-control" />
     <br />
     <label>Enter Employee Name:</label>
     <input type="text" name="firstName" id="firstName" class="form-control" />
     <br />
     <label>Enter Employee Surname:</label>
     <textarea name="secondName" id="secondName" class="form-control"></textarea>
     <br />
     <label>Enter Date Of Birth</label>
     <input type="date" name="DOB" data-date="" data-date-format="YYYY-MMMM-DD" value="2019-08-09">
     <br />  
     <label>Select Role</label>
     <select name="role" id="role" class="form-control">
      <option value="Employee">Employee</option>  
      <option value="Manager">Manager</option>
     </select>
     <br />  
     <?php
       $hostname="silva.computing.dundee.ac.uk";
       $dbUsername="19ac3u14";
       $dbPass="cba123";
       $dbname="19ac3d14";
       // connect to the database
       $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
         $resultSet= $db->query("SELECT BranchId FROM Branch");
      ?>
     <label>Select Branch</label>
     <select name="branchId" id="branchId" class="form-control">
      <?php
           while ($row = mysqli_fetch_assoc($resultSet)) {
               $BranchId= $row['BranchId'];
               echo"<option value='$BranchId'>$BranchId</option>";
           }
      ?>
     </select>
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>


<script type="text/javascript" language="javascript" >
  function goBack() {
   header('location: manager.php');
}

 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetchEmployeeDetails.php",
     type:"POST"
    }
   });
  }
 $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });

  
 function update_data(id, column_name, value)
  {
   $.ajax({
    url:"updateEmployee.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
 
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });


  

   });
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#email').val() == "")  
  {  
   alert("Email is required");  
  }  
  else if($('#password').val() == '')  
  {  
   alert("Password is required");  
  }  
  else if($('#firstName').val() == '')
  {  
   alert("Employee Name is required");  
  }
   else if($('#secondName').val() == '')  
  {  
   alert("Employee surname is required");  
  }  
   else  
  {  
   $.ajax({  
    url:"addEmployee.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
    $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  

 
});
</script>
