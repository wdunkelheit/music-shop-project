
<?php 


   if(!isset($_SESSION['email']) || $_SESSION['role']!= "Customer")
  {

    header("location:index.php");
  }


 ?>


<?php

// Credentials
$hostname = "silva.computing.dundee.ac.uk";
$dbUsername = "19ac3u14";
$dbPass = "cba123";
$dbname = "19ac3d14";

// Init error array.
$errors = array();

// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);

// BOOK REPAIR
if (isset($_POST['book_repair'])) {
    // receive all input values from the form

    $itemname = mysqli_real_escape_string($db, $_POST['item-name']);
    $itemtype = mysqli_real_escape_string($db, $_POST['item-type']);
    $startdate = mysqli_real_escape_string($db, $_POST['startdate']);
    $enddate = mysqli_real_escape_string($db, $_POST['enddate']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

    if (empty($itemname)) {
        array_push($errors, "Item name is required");
    }
    if (empty($itemtype)) {
        array_push($errors, "Item type is required");
    }
    if (empty($startdate)) {
        array_push($errors, "Start date is required");
    }
    if (empty($enddate)) {
        array_push($errors, "End date is required");
    }

    // first check the database to make sure 
    // a user does exist with the same email
    // or if there are multiple with it (not allowed) give error
     $email = $_SESSION['email'];
    $user_check_query = "SELECT customerid FROM customer WHERE AccountID IN ( SELECT AccountID FROM account WHERE email = '$email')";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 1) {
        array_push($errors, "Account Email overburden error: Please contact an administrator.");
    }


    // Finally, register the booking
    if (count($errors) == 0) {

        $query = "INSERT INTO repair (CustomerAccountID, ItemName, ItemType, StartDate, EndDate)
            VALUES((SELECT customerid FROM customer WHERE AccountID IN 
                (SELECT AccountID FROM account WHERE email = '$email'))
                , '$itemname', '$itemtype', '$startdate', '$enddate');";

        if (mysqli_query($db, $query)) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $latest_id =  mysqli_insert_id($db);

        header('location: repairBooking.php');

        $query = "CALL SellGood ('$selldate', '$custemail','$branchID', '$prodID', '$quant'";

    }
}
