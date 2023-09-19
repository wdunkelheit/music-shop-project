
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<?php 
 session_start();

  if(!isset($_SESSION['email']) || $_SESSION['role']!= "Root")
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
    <a class="btn btn-large btn-primary logout"  style="font-size:18px" href="root.php">
    <span><i class="fa fa-user-secret" style="font-size:48px;">Hacker mode</i></span>
  </div>
  <div class="text_div">
    <span> Hello:<?=$_SESSION['email'] ?></span><br>
    <span>You are a <?=$_SESSION['role'] ?></span><br>
     <span>AccountID: <?=$_SESSION['accountID'] ?></span>
  </div>
</li>
 <li style="float:right">
<div class="widgets_div">  
<a class="btn btn-large btn-primary logout" style="font-size:28px" style="vertical-align: top;"href="Logout.php">
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
  </a>
  </div>
  <ul>
<br>
<li><i class="fa fa-users" aria-hidden="true" style="font-size:18px; color:grey "></i><a href="employeeDetails.php" class="nav-link">Employee Details</li>
<li><i  class='fas'style="font-size:18px;color:grey">&#xf2b9;</i></i><a href="customerDetails.php" class="nav-link">Customer Details</a></li>
 <li><i class="fa" style="font-size:18px;color:grey">&#xf0ad;<a href="repairList.php" class="nav-link">Repair</a></li>
<li><i class="material-icons" style="font-size:18px;color:grey">&#xe0ba;</i><a href="accountDetails.php" class="nav-link">Account Details</a></li>
<li><i class="fa fa-bar-chart" style="font-size:18px;color:grey"></i><a href="statistic.php" class="nav-link">Statistics</a></li>
</br>
  </ul>
 </div>
</body>
</html>

