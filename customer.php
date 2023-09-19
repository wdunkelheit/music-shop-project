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
<style>
body {
  color: #000000;
  font-family: Sans-Serif;
  padding: 30px;
  background-color: #f6f6f6;
}

a {
  text-decoration: none;
  color: #000000;
}

a:hover {
  color: #222222
}

/* Dropdown */

.dropdown {
  display: inline-block;
  position: relative;
}

.dd-button {
  display: inline-block;
  border-radius: 4px;
  padding: 10px 30px 10px 20px;

  cursor: pointer;
 
}

.dd-button:after {
  content: '';
  position: absolute;
  top: 50%;
  right: 15px;
  transform: translateY(-50%);
  width: 0; 
  height: 0; 
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid black;
}

.dd-button:hover {
  background-color: #eeeeee;
}


.dd-input {
  display: none;
}

.dd-menu {
  position: absolute;
  top: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 0;
  margin: 2px 0 0 0;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);
 
  list-style-type: none;
}

.dd-input + .dd-menu {
  display: none;
} 

.dd-input:checked + .dd-menu {
  display: block;
} 

.dd-menu li {
  padding: 10px 20px;
  cursor: pointer;
  white-space: nowrap;
}

.dd-menu li:hover {
  background-color: #f6f6f6;
}

.dd-menu li a {
  display: block;
  margin: -10px -20px;
  padding: 10px 20px;
}

.dd-menu li.divider{
  padding: 0;
  border-bottom: 1px solid #cccccc;
}
</style>


<?php 
 session_start();

   if(!isset($_SESSION['email']) || $_SESSION['role']!= "Customer")
  {

    header("location:index.php");
  }


 ?>

<!DOCTYPE html>
<html>
<head>
  <ul>
  <li>
<div class="widgets_div" align="left">
  <div class="icon_div">
    <a class="btn btn-large btn-primary logout"  style="font-size:18px" href="customer.php">
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
</li>
</ul>
 <title>Hide/show menu</title>
 <style type="text/css">
  *{
   margin: 0;
   padding: 0;
   font-family: sans-serif;
  }

  #sidebar{
   position: fixed;
   width: 200px;
   height: 100%;
   background: #333;
   left: -200px;
   transition: all 500ms linear;
  }
  #sidebar.active{
   left:0px;
  }
  #sidebar ul li{
   color: rgba(0,0,0,0.9);
   list-style: none;
   padding: 15px 10px;
   border-bottom: 1px solid rgba(0,0,0,0);
  }
  #sidebar .toggle-btn{
   position: absolute;
   left: 230px;
   top: 20px;
  }
  #sidebar .toggle-btn span{
   display: block;
   width: 30px;
   height: 5px;
   background: #151719;
   margin: 5px 0px;

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

li a:hover:not(.active) {
  background-color: #cccccc;
}

.active {
  background-color: grey;
}
 </style>
 <script type="text/javascript">
  function toggleSidebar(){
   document.getElementById("sidebar").classList.toggle('active');
  }
 </script>
</head>
<body>
 <div id="sidebar">
  <div class="toggle-btn" onclick="toggleSidebar()"><a>
   <span></span>
   <span></span>
   <span></span>
       <h2>Customer Details</h2>

  </a>
  </div>
  <ul>
<br>

<li><i class="material-icons" style="font-size:18px; color:grey ">&#xe88a;</i><a href="index.php" class="nav-link">Home</a></li>
<li><i class="fas" style="font-size:18px;color:grey">&#xf7a6;</i><a href="product.php" class="nav-link">Products</a></li>
<label class="dropdown">

  <div class="dd-button">
  <i class="fa fa-wrench" style="font-size:18px;color:grey">Repair</i></a>
  </div>

  <input type="checkbox" class="dd-input" id="test">

  <ul class="dd-menu">
    <a href="repairCustomerList.php">Add Item to be repaired</a>
    <li class="divider"></li>
    <li>
    </li>
  </ul>
  
</label>
<li><i class="material-icons" style="font-size:18px;color:grey">&#xe0ba;</i><a href="accountDetails.php" class="nav-link">Account Details</a></li>
</br>
  </ul>
 </div>
</body>
</html>
 



