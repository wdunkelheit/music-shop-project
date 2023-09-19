<?php

$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);



$columns = array('EmployeeID', 'FirstName', ' SecondName', 'DateOfBirth', 'Role', 'BranchID', 'AccountID');

$query = "SELECT * FROM employee ";

if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE firstName LIKE "%'.$_POST["search"]["value"].'%" 
 OR secondName LIKE "%'.$_POST["search"]["value"].'%"';
  $query .= 'OR employee.Role LIKE "%'.$_POST["search"]["value"].'%"';
   $query .= 'OR employee.BranchId LIKE "%'.$_POST["search"]["value"].'%"';
}


if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY EmployeeID ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

$result = mysqli_query($db, $query . $query1);

$data = array();


   
 

while($row = mysqli_fetch_array($result))
{

 $sub_array = array();
 $sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["EmployeeID"].'" data-column="EmployeeID">' . $row["EmployeeID"] . '</div>';
 $sub_array[] = '<div contenteditable class="update"  data-id="'.$row["EmployeeID"].'" data-column="FirstName">' . $row["FirstName"] . '</div>';
 $sub_array[] = '<div contenteditable class="update"  data-id="'.$row["EmployeeID"].'" data-column="SecondName">' . $row["SecondName"] . '</div>';
  $sub_array[] = '<div contenteditable class="update"  data-id="'.$row["EmployeeID"].'" data-column="DateOfBirth">' . $row["DateOfBirth"] . '</div>';
   $sub_array[] = '<div contenteditable="false" class="update"  data-id="'.$row["EmployeeID"].'" data-column="Role">' . $row["Role"] . '</div>';
    $sub_array[] = '<div contenteditable class="update"  data-id="'.$row["EmployeeID"].'" data-column="BranchID">' . $row["BranchId"] . '</div>';
     $sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["EmployeeID"].'" data-column="AccountID">' . $row["AccountID"] . '</div>';
      $sub_array[] = '<button type="button" name="edit" class="btn btn-danger btn-xs edit" id="'.$row["EmployeeID"].'">Edit</button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["EmployeeID"].'">Delete</button>';
 $data[] = $sub_array;

}

function get_all_data($db)
{
 $query = "SELECT * FROM employee";
 $result = mysqli_query($db, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($db),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
 
);

echo json_encode($output);

?>

