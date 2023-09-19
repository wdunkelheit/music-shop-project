



 


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
if (isset($_POST)) {
    // receive all input values from the form
    $AccountID= mysqli_real_escape_string($db, $_POST['accountID']);
    $itemname = mysqli_real_escape_string($db, $_POST['name']);
    $itemtype = mysqli_real_escape_string($db, $_POST['itemType']);
    $startdate = mysqli_real_escape_string($db, $_POST['startDate']);
    $enddate = mysqli_real_escape_string($db, $_POST['endDate']);

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
      if (empty($AccountID)) {
        array_push($errors, "AccountID is required");
    }

    echo $AccountID;
       echo   $itemname;
        echo $itemtype;

   $query = "INSERT INTO repair (CustomerAccountID, ItemName, ItemType, StartDate, EndDate)
            VALUES( ' $AccountID','$itemname', '$itemtype', '$startdate', '$enddate')";

      

        if (mysqli_query($db, $query)) {
            echo 'New Repair Data Added';
      }

    

    }
?>
