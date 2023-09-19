<?php
$hostname="silva.computing.dundee.ac.uk";
$dbUsername="19ac3u14";
$dbPass="cba123";
$dbname="19ac3d14";

// connect to the database
$db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname); 

if(!empty($_POST))
{
 $output = '';
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $postcode = mysqli_real_escape_string($db, $_POST['postcode']); 
  $phoneNo = mysqli_real_escape_string($db, $_POST['phoneNo']);
  $DOB = mysqli_real_escape_string($db, $_POST['DOB']);

    $email = mysqli_real_escape_string($db, $_POST["email"]);  
    $password = mysqli_real_escape_string($db, $_POST["password"]);  
    $firstName = mysqli_real_escape_string($db, $_POST["firstName"]);  
    $secondName = mysqli_real_escape_string($db, $_POST["secondName"]);  
    $DOB = mysqli_real_escape_string($db, $_POST["DOB"]);
     $role = mysqli_real_escape_string($db, $_POST["role"]);
      $branchId = mysqli_real_escape_string($db, $_POST["branchId"]);
    
    $password = hash('ripemd160',$password);//encrypt the password before saving in the database
   
    $query = "INSERT INTO account (email, hashPass, accountType) 
    VALUES('$email', '$password','$role')";
     
     if (mysqli_query($db, $query)) {
      echo "New record created successfully";
     } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
      }
      $latest_id =  mysqli_insert_id($db);    
     

     $query1 = "INSERT INTO  employee(FirstName, SecondName, DateOfBirth, Role, BranchId, AccountID)
     VALUES( '$firstName','$secondName', '$DOB', '$role', ' $branchId ' ,'$latest_id')";
     
     

    if(mysqli_query($db, $query1))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM employee ORDER BY id DESC";
     $result = mysqli_query($db, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Employee Name</th>  
                         <th width="30%">View</th>  
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["name"] . '</td>  
                         <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>








