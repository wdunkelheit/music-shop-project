<?php

$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);

if(isset($_POST["id"]))
{
     $query = "SELECT * FROM employee WHERE employeeID='".$_POST["id"]."'";
    $results = mysqli_query($db, $query);
    
   

    if (mysqli_num_rows($results) == 1) {

    
       while($RowtoDelete = $results->fetch_assoc())
      { 
        $AccountIDtoDelete=$RowtoDelete["AccountID"];
      
      }
    
    echo $AccountIDtoDelete;
    $query2 = "Delete  FROM account WHERE AccountID = '$AccountIDtoDelete'" ;
    $result = mysql_query($query2, $db);
    
    if(mysqli_query($db, $query2))
    {
     echo 'Data Deleted from:';
     echo $AccountIDtoDelete;
    }
  
   
}
}
?>

