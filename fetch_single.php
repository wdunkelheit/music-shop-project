<?php

//fetch_single.php

include('database_connection.php');

if(isset($_GET["id"]))
{
 $query = "SELECT * FROM customer WHERE CustomerID = '".$_GET["id"]."'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<div class="row">';
 foreach($result as $row)
 {
 
  
  $output .= '
  
   <br />
   <p><label>CustomerID :&nbsp;</label>'.$row["CustomerID"].'</p>
   <p><label>Name :&nbsp;</label>'.$row["Name"].'</p>
   <p><label>Address :&nbsp;</label>'.$row["Address"].'</p>
   <p><label>PostCode :&nbsp;</label>'.$row["PostCode"].'</p>
   <p><label>Phone No :&nbsp;</label>'.$row["phoneNo"].'</p>
   <p><label>Date Of Birth :&nbsp;</label>'.$row["DateOfBirth"].'</p>
  </div>
  </div><br />
  ';
 }
 echo $output;
}

?>
