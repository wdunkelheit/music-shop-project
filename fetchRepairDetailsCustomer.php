
<?php 
 session_start();

  if(!isset($_SESSION['email']) || $_SESSION['role']!= "Customer")
  {

    header("location:index.php");
  }


 ?>

       <?php
       $hostname="silva.computing.dundee.ac.uk";
       $dbUsername="19ac3u14";
       $dbPass="cba123";
       $dbname="19ac3d14";
       // connect to the database
       $searchID=$_SESSION['accountID'];
       $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
         $resultSet= $db->query("SELECT Category FROM Product");
         $CustomerID= $db->query("SELECT CustomerID FROM customer where AccountID= $searchID  ");
 


    $CustomerID= $db->query("SELECT CustomerID FROM customer where AccountID= $searchID  ");
// connect to the database

  while ($row = mysqli_fetch_assoc($CustomerID)) {
               $ID= $row['CustomerID'];
             
           }


$columns = array('RepairId', 'CustomerAccountID', ' ItemName', 'ItemType', 'StartDate', 'EndDate');

$query = "SELECT * FROM repair WHERE CustomerAccountID= '$ID' ";

if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE CustomerAccountID LIKE "%'.$_POST["search"]["value"].'%" 
 OR CustomerAccountID LIKE "%'.$_POST["search"]["value"].'%"';
  $query .= 'OR repair.ItemType LIKE "%'.$_POST["search"]["value"].'%"';
   $query .= 'OR repair.ItemName LIKE "%'.$_POST["search"]["value"].'%"';
   $query .= 'OR repair.StartDate LIKE "%'.$_POST["search"]["value"].'%"';
     $query .= 'OR repair.EndDate LIKE "%'.$_POST["search"]["value"].'%"';
}


if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY CustomerAccountID ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));

$result = mysqli_query($db, $query);


$data = array();


   
 

while($row = mysqli_fetch_array($result))
{

 $sub_array = array();
 $sub_array[] = '<div contenteditable="false" class="update" data-id="'.$row["RepairId"].'" data-column="RepairId">' . $row["RepairId"] . '</div>';
 $sub_array[] = '<div contenteditable="false" class="update"  data-id="'.$row["RepairId"].'" data-column="CustomerAccountID">' . $row["CustomerAccountID"] . '</div>';
 $sub_array[] = '<div contenteditable class="update"  data-id="'.$row["RepairId"].'" data-column="ItemName">' . $row["ItemName"] . '</div>';
  $sub_array[] = '<div contenteditable class="update"  data-id="'.$row["RepairId"].'" data-column="ItemType">' . $row["ItemType"] . '</div>';
   $sub_array[] = '<div contenteditable="false" class="update"  data-id="'.$row["RepairId"].'" data-column="StartDate">' . $row["StartDate"] . '</div>';
    $sub_array[] = '<div contenteditable="false" class="update"  data-id="'.$row["RepairId"].'" data-column="EndDate">' . $row["EndDate"] . '</div>';
      $sub_array[] = '<button type="button" name="edit" class="btn btn-danger btn-xs edit" id="'.$row["RepairId"].'">Edit</button>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["RepairId"].'">Delete</button>';
 $data[] = $sub_array;

}

function get_all_data($db)
{   
     $searchID=$_SESSION['accountID'];
     $CustomerID= $db->query("SELECT CustomerID FROM customer where AccountID= $searchID  ");
// connect to the database

  while ($row = mysqli_fetch_assoc($CustomerID)) {
               $ID= $row['CustomerID'];
             
           }
 $query = "SELECT * FROM repair WHERE CustomerAccountID= '$ID' ";
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





