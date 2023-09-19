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
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
 </style>


<?php 
 session_start();

 if(!isset($_SESSION['email']) || $_SESSION['role']!= "Employee")
  {

    header("location:index.php");
  }


 ?>

<head>
  <ul>
  <li>
<div class="widgets_div" align="left" >
  <div class="icon_div" >
    <a class="btn btn-large btn-primary logout"   style="font-size:18px" href="employee.php">
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
<a class="btn btn-large btn-primary logout" style="font-size:28px" style="vertical-align: top;"href="employee.php">
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
   <?php
 $hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";



// connect to the database
 $DBcon = new PDO("mysql:host=$hostname;dbname=$dbname",$dbUsername,$dbPass);
?>

           
    <?php 
   
              $accountID=$_SESSION['accountID'] ;
              
        $query = "SELECT employee.EmployeeID, employee.FirstName, employee.SecondName, employee.DateOfBirth, employee.Role, employee.BranchId, employee.AccountID, account.AccountID, account.Email FROM employee,account Where employee.AccountID= account.AccountID and employee.AccountID= '$accountID'";
        $stmt = $DBcon->prepare( $query );
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $employeeID=$row['EmployeeID'];
             $name=$row['FirstName'];
              $surname=$row['SecondName'];
                 $DOB=$row['DateOfBirth'];
               $role=$row['Role'];
                 $branchID=$row['BranchId'];
                $accountID=$row['AccountID'];
                   $email=$row['Email'];

        }

        ?>

        <br>
        <table id="customers">
              
    <thead>
     <tr ><td><b>AccountID</b></td><td><?php echo $accountID; ?></td></tr>
<tr><td><b>Email</b></td><td><?php echo $email; ?></td></tr>
<tr ><td><b>EmployeeID</b></td><td><?php echo $employeeID; ?></td></tr>
<tr><td><b>Name</b></td><td><?php echo $name; ?></td></tr>
<tr><td><b>Surname</b></td><td><?php echo $surname; ?></td></tr>
<tr ><td><b>Role</b></td><td><?php echo $role; ?></td></tr>
<tr ><td><b>Branch ID</b></td><td><?php echo $branchID; ?></td></tr>
<tr ><td><b>Date Of Birth</b></td><td><?php echo $DOB; ?></td></tr>
    </thead>
  </table>
</br>

 
<a class="fas" style="font-size:28px;color: darkgreen">&#xf044;</i><a href="updateEmployeeAccountDetails.php" class="nav-link">Update Details</a>
             
