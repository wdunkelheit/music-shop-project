 <?php include('server.php'); 
 
 if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql= "DELETE FROM repair WHERE RepairId='$id'";
    $result= $db->query($sql);
 
 }
 if((!isset($_GET['edit']))&&(!isset($_GET['add']))){
     header("location: repairEmployee.php"); 
 }?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beats By Dr Murray - Repairs</title>
<!--
Classic Template
http://www.templatemo.com/tm-488-classic
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>
  
    <body>
	<div class ="container-fluid">
		<div align=right>
			<button onclick="document.getElementById('id01').style.display='block'">Login</button>
			<button onclick="document.getElementById('id02').style.display='block'">Basket</button>
		</div>
		<div id="id01" class="modal">

  			<form class="modal-content animate" action="/action_page.php">
			<div class="avatarcontainer">
				<span onclick="document.getElementById('id01').style.display='none'"class="close" title="Close Modal">&times;</span>
      				<img src="img/login-avatar.png" alt="Avatar" class="avatar">
    			</div>

    			<div class="container">
     	 			<label for="uname"><b>Username</b></label>
      				<input type="text" placeholder="Enter Username" name="uname" required>

      				<label for="psw"><b>Password</b></label>
      				<input type="password" placeholder="Enter Password" name="psw" required>

      				<button type="submit">Login</button>
    			</div>

                
                
                
   			<div class="container" style="background-color:#f1f1f1">
      				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      				<span class="psw">Forgot <a href="#">password?</a></span>
    			</div>

  		</form>
		</div>
		<div id="id02" class="modal">
  			<form class="modal-content animate">
			<div class="avatarcontainer">
				<span onclick="document.getElementById('id02').style.display='none'"class="close" title="Close Modal">&times;</span>
    			</div>
			
			<div class="container">
				<b>Placeholder</b>
			</div>
   			<div class="container" style="background-color:#f1f1f1">
      				<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    			</div>
  			</form>
		</div>
	</div>
        <div class="header">
            <div class="container-fluid">
                <div class="header-inner">
		    <img src="img/Logo.svg" class="logo-image">
                    
                    <!-- navbar -->
                    <nav class="navbar main-nav">

                        <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#Navbar">
                            &#9776;
                        </button>
                        
                        <div class="collapse navbar-toggleable-sm" id="Navbar">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a href="home.php" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="product.php" class="nav-link">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about.php" class="nav-link">About</a>
                                </li>
                                <li class="nav-item active">
                                    <a href="repairEmployee.php" class="nav-link">Repair</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.php" class="nav-link">Contact</a>
                                </li>
                            </ul>                        
                        </div>
                        
                    </nav>  

                </div>                                  
            </div>            
        </div>
        <div class="about-img-container"></div>
        <section class="section">
            <div class="container-fluid">
               <!-- <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">-->
                      <!-- ####################EMPLOYEE VIEW#################### -->
                      <div class="blog-post">
                        <h3 class="gold-text">Repair Status - Customer View </h3>
                           <div class="container box">
                               <h1 align="center">Edit Repair Details</DATA></h1>
                               <br />
                               <div class="table-responsive" >
                               <br/>
                                <div align="right">
                                </div>
                                <br />
                                <div id="alert_message"></div>
                                <table id="user_data" class="table table-bordered table-striped">
                                 <thead>
                                  <tr>
                                    <th><strong>Repair ID</strong></th>
                                    <th><strong>Customer ID</strong></th>
                                    <th><strong>Item Name</strong></th>
                                    <th><strong>Item Type</strong></th>
                                    <th><strong>Start Date</strong></th>
                                    <th><strong>End Date</strong></th>
                                  </tr>
                                  <!--RepairId, CustomerAccountID, ItemName, ItemType, StartDate, EndDate-->
                                    <?php
                                        

                                        
                                        
                                     
                                        if( isset($_GET['edit']) ){
                                            
                                            $id = $_GET['edit'];
                                             if(isset($_POST['CustomerID'])){
                                                $CustomerID = $_POST['CustomerID'];
                                                $ItemName = $_POST['ItemName'];
                                                $ItemType = $_POST['ItemType'];
                                                $StartDate = $_POST['StartDate']; 
                                                $EndDate = $_POST['EndDate'];
                                                //echo "$CustomerID $ItemName $ItemType $StartDate $EndDate <br/>";
                                                $sql= "UPDATE repair SET CustomerAccountID='$CustomerID', ItemName='$ItemName', ItemType='$ItemType', StartDate='$StartDate', EndDate='$EndDate' WHERE RepairId='$id'";
                                                $result= $db->query($sql);
                                                
                                            }
                                            $sql= "SELECT * FROM repair WHERE RepairId='$id'";
                                            $result= $db->query($sql);
                                            $row = $result->fetch_assoc();
                                            $repID = $row["RepairId"];
                                            echo "<tr><td>".$row["RepairId"]. "</td><td>".$row["CustomerAccountID"]. "</td><td>".$row["ItemName"]. 
                                                 "</td><td>".$row["ItemType"]. "</td><td>".$row["StartDate"]. "</td><td>". $row["EndDate"].
                                                 "</td></tr>";
                                                 
                                                                            
                                       }
                                       
                                      

                                    ?>
                                    
                            <form action="repairEdit.php?edit=<?php echo $id ?>" method="post">
                                  <tr>
                                    <th><?php echo $row["RepairId"]; ?></th>
                                    <th><input size='5'" type="text" name="CustomerID" value='<?php echo $row["CustomerAccountID"]; ?>'></th>
                                    <th><input size='7' type="text" name="ItemName" value='<?php echo $row["ItemName"]; ?>'></th>
                                    <th><input size='7' type="text" name="ItemType" value='<?php echo $row["ItemType"]; ?>'></th>
                                    <th><input size='5' type="date" name="StartDate" value='<?php echo $row["StartDate"]; ?>'></th>
                                    <th><input size='5' type="date" name="EndDate" value='<?php echo $row["EndDate"]; ?>'></th>
                                  </tr>
                                    

                                </thead>
                                </table>
                                <!--</div>
                                </div>-->
                      
                                <input type="submit" name="updateSubmit" value=" Update "/>
                            </form>
                            <form action="repairEdit.php?delete=<?php echo $id ?>" method="post">
                            <input type="submit" name="deleteSubmit" value=" Delete Record"/>
                            </form>
                      </div>
        </section>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="footer-content-box">
                            <h3 class="gold-text title footer-content-box-title">Social</h3>
                            <ul class="nav">
                                <li>Twitter: @MurrayBeats</li>
                                <li>Facebook: MurrayBeats</li>
                                <li>Instagram @MurrayBeats</li>
                            </ul>   
                        </div>
                        
                                                
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="footer-content-box footer-links-container">
                            <h3 class="gold-text title footer-content-box-title">Shipping and Returns</h3>
                             <ul class="nav">
                                <li>Return Packages to:</li>
                                <li>8 Address Street, Dundee</li>
                                <li>DD1 43E</li>
                            </ul> 
                            
                            
                        </div>
                        
                    </div>

                    <!-- Add the extra clearfix for only the required viewport 
                        http://stackoverflow.com/questions/24590222/bootstrap-3-grid-with-different-height-in-each-item-is-it-solvable-using-only
                    -->
                    <div class="clearfix hidden-lg-up"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="footer-content-box">
                            <h3 class="gold-text title footer-content-box-title">Leave a Review</h3>
                            <ul class="nav">
                                <li>TrustPilot: TrustPilot.com/BBM</li>
                            </ul> 
                            <!--<a href="#" class="btn btn-gray text-uppercase">Read More</a>-->
                        </div>
                        
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                        <div class="footer-content-box">
                        
                            <h3 class="gold-text title footer-content-box-title">Support</h3>
                            <ul class="nav">
                                <li>support@MurrayBeats.com</li>
                            </ul> 
                            
                            <!--<a href="#" class="btn btn-gray text-uppercase"></a>-->

                        </div>
                        
                    </div>


                </div>
            <div class="row">
                    <div class="col-xs-12 copyright-col">
                        <p class="copyright-text">Copyright 2019 Beats by Dr Murray</p>
                    </div>
            </div>
            </div>
            
            
        </footer>

        <!-- load JS files -->
        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap, http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h --> 
        <script src="js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/) -->
       
</body>
</html>