<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
  *{
   margin: 0;
   padding: 0;
   font-family: sans-serif;
  }
 
  
  ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
 background-color: #333
}

li:last-child {
 
   background-color: #333;
}

li a {
  display: block;
  color: white;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
   background-color: #333;
}
a:link, a:visited {
  color: white;
  background-color: #333;
  border-style: none;
  cursor: auto;
}

a:link:active, a:visited:active {
  color: #3c2b2b;
}

li a:hover:not(.active) {
  background-color: #cccccc;
}

.active {
  background-color: grey;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
 </style>


<?php 
 session_start();

  if(!isset($_SESSION['email']))
  {

    header("location:index.php");
  }


 ?>

<head>
  <ul>
  <li>
<div class="widgets_div" align="left" >
  <div class="icon_div" >
    <a class="btn btn-large btn-primary logout"   style="font-size:18px" href="customer.php">
    <span><i class="fas fa-user" style="font-size:48px;"><?=$_SESSION['role'] ?></i></span>
  </div>
  <div class="text_div">
    <span> Hello:<?=$_SESSION['email'] ?></span><br>
    <span>You are a <?=$_SESSION['role'] ?></span><br>
     <span>AccountID: <?=$_SESSION['accountID'] ?></span>
  </div>


</li>
 <li style="float:right">
<div class="widgets_div">  
<a class="btn btn-large btn-primary logout" style="font-size:28px" style="vertical-align: top;"href="logout.php">
        <i class="fa fa-sign-out" aria-hidden="true">Logout</i>
</a>
<a class="btn btn-large btn-primary logout" style="font-size:28px" style="vertical-align: top;"href="accountDetails.php">
        <i class="material-icons">&#xe317;</i>Back</i>
</a>
</li>
</ul>


 <?php
  include 'connection.php';
 ?>
   <?php
       $hostname="silva.computing.dundee.ac.uk";
       $dbUsername="19ac3u14";
       $dbPass="cba123";
       $dbname="19ac3d14";
       // connect to the database
       $searchID=$_SESSION['accountID'];
       $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
         $CustomerID= $db->query("SELECT CustomerID FROM customer where AccountID= $searchID  ");



     ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Account Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<br/>
<br/>
<br/>
<br/>
  <h2> Update</h2>
  <p>Update user info:</p>            
  <table class="table">
    <thead>
      <tr>
        <th> CustomerID</th>
        <th> Name</th>
        <th>Address</th>
        <th>PostCode</th>
        <th>Phone Number</th>
            <th>Date Of Birth</th>
                <th>Account ID</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $table  = mysqli_query($connection ,'SELECT * FROM customer where accountID= '.$_SESSION['accountID'].' ');
          while($row  = mysqli_fetch_array($table)){ ?>
              <tr id="<?php echo $row['CustomerID']; ?>">
                  <td data-target="CustomerID"><?php echo $row['CustomerID']; ?></td>
                <td data-target="Name"><?php echo $row['Name']; ?></td>
                <td data-target="Address"><?php echo $row['Address']; ?></td>
                <td data-target="PostCode"><?php echo $row['PostCode']; ?></td>
                <td data-target="PhoneNo"><?php echo $row['phoneNo']; ?></td>
                  <td data-target="DateOfBirth"><?php echo $row['DateOfBirth']; ?></td>
                   <td data-target="AccountID"><?php echo $row['AccountID']; ?></td>
                <td><a href="#" data-role="update" data-id="<?php echo $row['CustomerID'] ;?>">Update</a></td>
              </tr>
         <?php }
       ?>
       
    </tbody>
  </table>

  

  
</div>

      <?php
       $hostname="silva.computing.dundee.ac.uk";
       $dbUsername="19ac3u14";
       $dbPass="cba123";
       $dbname="19ac3d14";
       // connect to the database
       $searchID=$_SESSION['accountID'];
       $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
         $CustomerID= $db->query("SELECT CustomerID FROM customer where AccountID= $searchID  ");
         
     ?>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            
      <div class="form-group">
      <label>Enter  Name:</label>
      <input type="text" name="Name" id="Name" maxlength="80" class="form-control">   
      </div>
      <div class="form-group">
      <label>Enter Address :</label>
      <input type="text" name="Address" id="Address" class="form-control">
       <div class="form-group"> 
       </div>
<label>Enter PostCode:</label>
<input type="text" name="PostCode" id="PostCode" class="form-control">
   <div class="form-group">
     </div>
 <label>Phone Number:</label>
 <input type="tel" name="PhoneNo" id="PhoneNo" class="form-control">
     <div class="form-group">
       </div>
 <label>Date of Birth:</label>
 <input type="date" name="DateOfBirth" id="DateOfBirth" data-date="" data-date-format="YYYY-MMMM-DD" value="2019-11-01">
 </div>
 <input type="hidden" id="CustomerID" class="form-control">

          
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

</body>

<script>
  $(document).ready(function(){

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var CustomerID  = $(this).attr('data-id');
            var Name  = $('#'+CustomerID).children('td[data-target=Name]').text();
            var Address  = $('#'+CustomerID).children('td[data-target=Address]').text();
            var PostCode  = $('#'+CustomerID).children('td[data-target=PostCode]').text();
               var PhoneNo  = $('#'+CustomerID).children('td[data-target=PhoneNo]').text();
                 var DateOfBirth  = $('#'+CustomerID).children('td[data-target=DateOfBirth]').text();
              
            $('#Name').val(Name);
            $('#Address').val(Address);
            $('#PostCode').val(PostCode);
            $('#PhoneNo').val(PhoneNo);
           $('#DateOfBirth').val(DateOfBirth);
             $('#CustomerID').val(CustomerID);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
         
             var CustomerID = $('#CustomerID').val(); 
            var Name  =   $('#Name').val();
            var Address  = $('#Address').val();
            var PostCode  =    $('#PostCode').val();
               var PhoneNo  = $('#PhoneNo').val();
                 var DateOfBirth  = $('#DateOfBirth').val();
              

         

          $.ajax({
              url      : 'connection.php',
              method   : 'post', 
              data     : {Name : Name , Address: Address , PostCode : PostCode , PhoneNo: PhoneNo, DateOfBirth: DateOfBirth, CustomerID:CustomerID},
              success  : function(response){
                            // now update user record in table 
                  console.log(response);
                    $('#'+CustomerID).children('td[data-target=Name]').text(Name);
                             $('#'+CustomerID).children('td[data-target=Address]').text(Address);
                             $('#'+CustomerID).children('td[data-target=PostCode]').text(PostCode);
                             $('#'+CustomerID).children('td[data-target=PhoneNo]').text(PhoneNo);
                             $('#'+CustomerID).children('td[data-target=DateOfBirth]').text(DateOfBirth);
                             $('#myModal').modal('toggle'); 
    
                         }
          });
       });
  });
</script>
</html>
