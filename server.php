<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $postcode = mysqli_real_escape_string($db, $_POST['postcode']); 
  $phoneNo = mysqli_real_escape_string($db, $_POST['phoneNo']);
  $DOB = mysqli_real_escape_string($db, $_POST['DOB']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($postcode)) { array_push($errors, "Postcode is required"); }
  if (empty($DOB)) { array_push($errors, "Date of Birth is required"); } 

  // first check the database to make sure 
  // a user does not already exist with the same email
  $user_check_query = "SELECT * FROM account WHERE  email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){ array_push($errors, "email already exists"); }
  


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    
    $password = hash('ripemd160',$password_1);//encrypt the password before saving in the database
   
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
     
  

      session_regenerate_id();
    $_SESSION['email'] = $email;
    $_SESSION['role'] =  "Customer";
    session_write_close();

    $_SESSION['success'] = "You are now logged in";
    header('location: customer.php');
  }
  

}


// ... 
// LOGIN USER
if (isset($_POST["login_user"])) {
  $email =  $_POST["email"];
  $password =  $_POST["password"];

  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = hash('ripemd160',$password);
    $query = "SELECT * FROM account WHERE email='$email' AND hashPass='$password'";
    $results = mysqli_query($db, $query);
    
   

    if (mysqli_num_rows($results) > 0) {

      if (! $results){
         throw new My_Db_Exception('Database error: ' . mysql_error());
       }
       while($row = $results->fetch_assoc())
      { 
        $role=$row["AccountType"];
        $AccountID=$row["AccountID"];
        echo $role;
        if($row["AccountType"]== "Manager")
        {
           session_regenerate_id();
           $_SESSION['email'] = $row["Email"];
           $_SESSION['role'] =  $row["AccountType"];
            $_SESSION['accountID'] =  $row["AccountID"];
           session_write_close();

          $_SESSION['success'] = "You are now logged in";
          header('location: manager.php');
        }
        else if($row["AccountType"]== "Customer" ||$row["AccountType"]== "customer")
        {
           session_regenerate_id();
           $_SESSION['email'] = $row["Email"];
           $_SESSION['role'] =  $row["AccountType"];
           $_SESSION['accountID'] =  $row["AccountID"];
           session_write_close();

        
          header('location: customer.php');
        }
        else if($row["AccountType"]== "Employee")
        {
           session_regenerate_id();
           $_SESSION['email'] = $row["Email"];
           $_SESSION['role'] =  $row["AccountType"];
          $_SESSION['accountID'] =  $row["AccountID"];
           session_write_close();

         
          header('location: employee.php');
        }
           else if($row["AccountType"]== "Root")
        {
           session_regenerate_id();
           $_SESSION['email'] = $row["Email"];
           $_SESSION['role'] =  $row["AccountType"];
           $_SESSION['accountID'] =  $row["AccountID"];
           session_write_close();

          header('location: root.php');
        }
      }
        
        
       

 }else{array_push($errors, "Wrong username/password combination");}
   

 }
}

?>



