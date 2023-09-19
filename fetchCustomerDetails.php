<?php

//fetch.php

include('database_connection.php');
$query = '';
$output = array();
$query .= "SELECT * FROM customer ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE Name LIKE "%'.$_POST["search"]["value"].'%" OR Address LIKE "%'.$_POST["search"]["value"].'%" OR PostCode LIKE "%'.$_POST["search"]["value"].'%" OR PhoneNo LIKE "%'.$_POST["search"]["value"].'%" OR DateOfBirth LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY CustomerID ASC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["CustomerID"];
 $sub_array[] = $row["Name"];
 $sub_array[] = $row["PostCode"];
 $sub_array[] = $row["phoneNo"];
 
 
 $sub_array[] = '<button type="button" name="view" id="'.$row["CustomerID"].'" class="btn btn-primary btn-xs view">View</button>';
 //$sub_array[] = '<button type="button" name="update" id="'.$row["CustomerID"].'" class="btn btn-warning btn-xs update">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["CustomerID"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 $data[] = $sub_array;
}

function get_total_all_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM customer");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records($connect),
 "data"    => $data
);
echo json_encode($output);
?>