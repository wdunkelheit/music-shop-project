
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


table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, #branch th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #5a8285;
  color: white;
}
  
 </style>
<?php 
 session_start();

  if(!isset($_SESSION['email']) || $_SESSION['role']!= "Customer")
  {

    header("location:index.php");
  }


 ?>


<head>
  <ul>
  <li>
<div class="widgets_div" align="left" >
  <div class="icon_div" >
    <a class="btn btn-large btn-primary logout"   style="font-size:18px" href="customer.php">
    <span><i class="fas fa-user" style="font-size:48px;"><?=$_SESSION['role'] ?></i></span>
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
<a class="btn btn-large btn-primary logout" style="font-size:28px" style="vertical-align: top;"href="customer.php">
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
  <title>Repair Details</title>
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
      <?php
       $hostname="silva.computing.dundee.ac.uk";
       $dbUsername="19ac3u14";
       $dbPass="cba123";
       $dbname="19ac3d14";
       // connect to the database
       $searchID=$_SESSION['accountID'];
       $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
         $resultSet= $db->query("SELECT Category FROM Product");
         $CustomerID= $db->query("SELECT CustomerID FROM customer where AccountID= $searchID  ");
           $CustomerID1= $db->query("SELECT CustomerID FROM customer where AccountID= $searchID  ");
     ?>
 <body>
  <div class="container box">
   <h1 align="center">Repair Details</DATA></h1>
   <br />
   <div class="table-responsive">
   <br />
    <div align="right">
         <button type="button"  data-toggle="modal" data-target="#add_Repair" class="btn btn-warning">Add</button>
    </div>
    <br />
    <div id="alert_message"></div>
 
  <h2>Customer Repair Data</h2>
 <?php


 $hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";



// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);

  $accountID=$_SESSION['accountID'] ;

               while ($row = mysqli_fetch_assoc($CustomerID)) {
               $ID= $row['CustomerID'];
              
           }
              
        $query = "SELECT *FROM Repair WHERE CustomerAccountID='$ID'";
  

$result = mysqli_query($db,$query);

echo "<table>
<tr>
<th>Repair ID</th>
<th>Item Name</th>
<th>Item Type</th>
<th>Start Date</th>
<th>End Date</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
     echo "<td>" . $row['0'] . "</td>";
    echo "<td>" . $row['1'] . "</td>";
    echo "<td>" . $row['2'] . "</td>";
    echo "<td>" . $row['3'] . "</td>";
    echo "<td>" . $row['4'] . "</td>";
  
   
    echo "</tr>";
}
echo "</table>";

?>

<div id="add_Repair" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add New Repair</h4>
   </div>
    <div class="modal-body">
    <form method="post" id="insert_form">

 <label>Enter Item Name:</label>
 <input type="text" name="name" id="name" maxlength="80" class="form-control">   <i>(e.g: Electric Guitar) - Max 30 Characters</i>
  <br />  
 <label>Enter Item Type:</label>
<select name="itemType" id="itemType" class="form-control">
      <?php

           while ($row = mysqli_fetch_assoc($resultSet)) {
               $itemType= $row['Category'];
               echo"<option value='$itemType'>$itemType</option>";
           }
      ?>
      <option value="Other">Other</option>
     </select>
  <br />  
 <label>Start Date:</label>
<input type="date" name="startDate" id="startDate" data-date="" data-date-format="YYYY-MMMM-DD" value="2019-11-01">
  <br />  
 <label>End Date:</label>
<select name="endDate" id="endDate" class="form-control">
  <option value="0000-00-00">0000-00-00</option>
  </select>
    <br /> 
 <label>Customer Account ID</label>
<select name="accountID" id="accountID" class="form-control">
      <?php

           while ($row = mysqli_fetch_assoc($CustomerID1)) {
               $ID1= $row['CustomerID'];
               echo"<option value='$ID1'>$ID1</option>";
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
    <h4 class="modal-title">Repair Details</h4>
   </div>
   <div class="modal-body" id="Repair_detail">
    
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

 
  

 
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else if($('#itemType').val() == '')  
  {  
   alert("Item type is required");  
  }  
  else if($('#startDate').val() == '')
  {  
   alert("Start Date is required");  
  }
   else if($('#endDate').val() == '')  
  {  
   alert("End Date is required");  
  }  
     else if($('#accountID').val() == '')  
  {  
   alert("End Date is required");  
  }  
   else  
  {  
   $.ajax({  
    url:"addRepair.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
    $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#Repair_table').html(data);  
      header('customer.php');
    }  
   });  
  }  

 
});
</script>
