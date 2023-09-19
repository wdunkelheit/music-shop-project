<?php


// initializing variables
$errors = array();

$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
//insert_data.php


if(isset($_POST["name"]))
{
 $error = '';
 $success = '';
 $name = '';
 $address = '';
 $postcode = '';
 $phoneNo = '';
 $DOB = '';
 $email = '';
 $password = '';
 if(empty($_POST["name"]))
 {
  $error .= '<p>Name is Required</p>';
 }
 else
 {
  $name = $_POST["name"];
 }
 if(empty($_POST["address"]))
 {
  $error .= '<p>Address is Required</p>';
 }
 else
 {
  $address = $_POST["address"];
 }
 if(empty($_POST["postcode"]))
 {
  $error .= '<p>Post Code is Required</p>';
 }
 else
 {
  $postcode = $_POST["postcode"];
 }
 if(empty($_POST["phoneNo"]))
 {
  $error .= '<p>Phone No is Required</p>';
 }
 else
 {
  $phoneNo= $_POST["phoneNo"];
 }
 if(empty($_POST["DOB"]))
 {
  $error .= '<p>Date of Birth is Required</p>';
 }
 else
 {
  $DOB= $_POST["DOB"];
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p>Email is Required</p>';
 }
 else
 {
  $email= $_POST["email"];
 }
  if(empty($_POST["password"]))
 {
  $error .= '<p>Password is Required</p>';
 }
 else
 {
  $password= $_POST["password"];

 
 }

  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($postcode)) { array_push($errors, "Postcode is required"); }
  if (empty($DOB)) { array_push($errors, "Date of Birth is required"); } 
  //$error .= 'Reached here';//uncomment here to see if it code reaches here....
  $password = hash('ripemd160',$password);//encrypt the password before saving in the database
 if (count($errors) == 0) {
   
    $query = "INSERT INTO account (email, hashPass, accountType) 
    VALUES('$email', '$password','Customer')";
     
     if (mysqli_query($db, $query)) {
      echo "New record created successfully";
     } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
      }
      $latest_id =  mysqli_insert_id($db);    
     

     $query1 = "INSERT INTO  customer(Name, Address, PostCode, PhoneNo, DateOfBirth, AccountID)
     VALUES( '$name', '$address', '$postcode', '$phoneNo' , '$DOB','$latest_id')";
     if (mysqli_query($db, $query1)) {
      echo "New record created successfully";
     } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
      }
 
}
}
?>






