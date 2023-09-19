<?php

$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);

if(isset($_POST["id"]))
{
   
    $query2 = "Delete  FROM repair WHERE RepairID = '".$_POST["id"]."'";
   
    
    if(mysqli_query($db, $query2))
    {
     echo 'Repair Data Deleted from ID:';
    echo $_POST["id"];
     
    
    }
  
   
}

?>
