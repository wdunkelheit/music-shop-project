
<?php
$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);

if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($db, $_POST["value"]);
 $query = "UPDATE repair SET ".$_POST["column_name"]."='".$_POST["value"]."' WHERE RepairID = '".$_POST["id"]."'";
 if (mysqli_query($db, $query)) {
     echo ' Repair Data Updated';
      echo 'With RepairID:';
    echo $_POST["id"];
      echo "<br>";
    echo "On column:";

    echo $_POST["column_name"];
     echo "<br>";
    	echo 'With value';
 	echo  $_POST["value"];
      }
 else
 {
 	echo 'failed to update RepairID:';
    echo $_POST["id"];
      echo "<br>";
    echo "On column:";

    echo $_POST["column_name"];
     echo "<br>";
    	echo 'With value';
 	echo  $_POST["value"];
 	
 }
}

?>









