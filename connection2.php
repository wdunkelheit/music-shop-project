
<?php
$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$connection = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);




if(isset($_POST['FirstName'])){
	
	$FirstName = $_POST['FirstName'];
	$SecondName = $_POST['SecondName'];

   $DateOfBirth = $_POST['DateOfBirth'];
   $id = $_POST['EmployeeID'];
   echo"Retrieced data";

   echo "FirstName:";
   echo  $FirstName;
	echo "<br>";
	echo "SecondName:";
	echo $SecondName ;
	echo "<br>";
	echo "DOB:";
   echo $DateOfBirth;
   echo "<br>";
   echo "EmployeeID:";
   echo $id ;

	//  query to update data 
	 
	$result  = mysqli_query($connection , "UPDATE employee SET FirstName='$FirstName' , SecondName='$SecondName' , DateOfBirth= '$DateOfBirth'  WHERE EmployeeID='$id' ");
	if($result){
	
  echo 'Data Updated with data.';

	
	echo "FirstName:";
   echo  $FirstName;
	echo "<br>";
	echo "SecondName:";
	echo $SecondName ;
	echo "<br>";
	echo "DOB:";
   echo $DateOfBirth;
   echo "<br>";
   echo "EmployeeID:";
   echo $id ;
	}

}
?>