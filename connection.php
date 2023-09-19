
<?php
$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$connection = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);




if(isset($_POST['Name'])){
	
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$PostCode = $_POST['PostCode'];
	$PhoneNo = $_POST['PhoneNo'];
   $DateOfBirth = $_POST['DateOfBirth'];
   $id = $_POST['CustomerID'];
   echo"Retrieced data";

   echo "Name:";
   echo  $Name;
	echo "<br>";
	echo "Address:";
	echo $Address ;
	echo "<br>";
	echo "PostCode:";
	echo $PostCode ;
	echo "<br>";
	echo "Phone Number:";
	echo $PhoneNo ;
	echo "<br>";
	echo "DOB:";
   echo $DateOfBirth;
   echo "<br>";
   echo "CustomerID:";
   echo $id ;

	//  query to update data 
	 
	$result  = mysqli_query($connection , "UPDATE customer SET Name='$Name' , Address='$Address' , PostCode = '$PostCode' ,PhoneNo= '$PhoneNo',DateOfBirth= '$DateOfBirth'  WHERE CustomerID='$id' ");
	if($result){
	
  echo 'Data Updated with data.';

	
	 echo "Name:";
   echo  $Name;
	echo "<br>";
	echo "Address:";
	echo $Address ;
	echo "<br>";
	echo "PostCode:";
	echo $PostCode ;
	echo "<br>";
	echo "Phone Number:";
	echo $PhoneNo ;
	echo "<br>";
	echo "DOB:";
   echo $DateOfBirth;
   echo "<br>";
   echo "CustomerID:";
   echo $id ;
	}

}
?>