<?php

//fetch_single.php

$username = '19ac3u14';
$password = 'cba123';

$db = new PDO( 'mysql:host=silva.computing.dundee.ac.uk;dbname=19ac3d14', $username, $password );


if(isset($_GET["id"]))
{
 $query = "SELECT * FROM repair WHERE RepairId = '".$_GET["id"]."'";

 $statement = $db->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<div class="row">';
 foreach($result as $row)
 {
 
 
  $output .= '

  <div class="col-md-9">
   <br />
   <p><label>Repair ID :&nbsp;</label>'.$row["RepairId"].'</p>
   <p><label>CustomerID :&nbsp;</label>'.$row["CustomerAccountID"].'</p>
   <p><label>Item Name :&nbsp;</label>'.$row["ItemName"].'</p>
   <p><label>Item Type :&nbsp;</label>'.$row["ItemType"].'</p>
   <p><label>Start Date :&nbsp;</label>'.$row["StartDate"].' </p>
    <p><label>End Date :&nbsp;</label>'.$row["EndDate"].' </p>
  </div>
  </div><br />
  ';
 }
 echo $output;
}

?>
