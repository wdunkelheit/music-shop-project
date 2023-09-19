
<?php
   session_start();
   if(session_destroy()){
  
   	  header('location: index.php');
   }

?>

<h1> Hello:<?=$_SESSION['email'] ?></h1>
<h2>You are a <?=$_SESSION['role'] ?></h2>
<h3>AccountID: <?=$_SESSION['accountID'] ?></h3>



