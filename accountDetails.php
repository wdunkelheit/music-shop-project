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

  if(!isset($_SESSION['email']))
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
  <title>Customer Details</title>
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
              
        $query = "SELECT customer.customerID, customer.Name, customer.Address, customer.PostCode, customer.phoneNo, customer.DateOfBirth, account.AccountID, account.Email FROM customer,account Where customer.AccountID= account.AccountID and customer.AccountID= '$accountID'";
        $stmt = $DBcon->prepare( $query );
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $customerID=$row['customerID'];
             $name=$row['Name'];
              $address=$row['Address'];
               $postCode=$row['PostCode'];
                $phoneNo=$row['phoneNo'];
                 $DOB=$row['DateOfBirth'];
                  $accountID=$row['AccountID'];
                   $email=$row['Email'];

        }

        ?>

        <br>
        <table id="customers">
              
    <thead>
     <tr ><td><b>AccountID</b></td><td><?php echo $accountID; ?></td></tr>
<tr><td><b>Email</b></td><td><?php echo $email; ?></td></tr>
<tr ><td><b>CustomerID</b></td><td><?php echo $customerID; ?></td></tr>
<tr><td><b>Name</b></td><td><?php echo $name; ?></td></tr>
<tr><td><b>Address</b></td><td><?php echo $address; ?></td></tr>
<tr ><td><b>PostCode</b></td><td><?php echo $postCode; ?></td></tr>
<tr ><td><b>PhoneNo</b></td><td><?php echo $phoneNo; ?></td></tr>
<tr ><td><b>Date Of Birth</b></td><td><?php echo $DOB; ?></td></tr>
    </thead>
  </table>
</br>


<a class="fas" style="font-size:28px;color: darkgreen">&#xf044;</i><a href="updateAccountDetails.php" class="nav-link">Update Details</a>



        

             
