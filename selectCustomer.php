 <?php  
 if(isset($_POST["customer_id"]))  
 {  
      $output = '';  
     $hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";



// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
      $query = "SELECT * FROM customer WHERE CustomerID = '".$_POST["customer_id"]."'";  
      $result = mysqli_query($db, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["Name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">'.$row["Address"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>PostCode</label></td>  
                     <td width="70%">'.$row["PostCode"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>PhoneNo</label></td>  
                     <td width="70%">'.$row["phoneNo"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>DateOfBirth</label></td>  
                     <td width="70%">'.$row["DateOfBirth"].' Year</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 