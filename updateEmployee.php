
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
 $query = "UPDATE employee SET ".$_POST["column_name"]."='".$value."' WHERE EmployeeID = '".$_POST["id"]."'";
 if(mysqli_query($db, $query))
 {
  echo 'Data Updated';
 }
}
?>
