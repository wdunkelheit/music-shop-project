<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beats By Dr Murray - Products</title>
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
    <div class = "main-container">
	<div class ="container-fluid">
		    <div align=right>
            <?php
            
            if(empty($_SESSION['accType']))
            {
                echo '<input type = "button" value = "Login" onclick="window.location=\'login.php\'"/>';
            }
            else
            {
            
            }
             ?> 
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
                                    <a href="index.php" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item active">
                                    <a href="product.php" class="nav-link">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about.php" class="nav-link">About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="repair.php" class="nav-link">Repair</a>
                                </li>
				                <li class="nav-item">
                                    <a href="contact.php" class="nav-link">Contact</a>
                                </li>
                                <li class="nav-item">
                                <?php
            
                                if(empty($_SESSION['accType']))
                                {
                                    
                                }
                                else if($_SESSION['accType'] == "employee")
                                {
                                    echo '<a href="employee.php" class="nav-link">Employee</a>';
                                }
                                else if($_SESSION['accType'] == "manager")
                                {
                                    echo '<a href="manager.php" class="nav-link">Manager</a>';
                                }
                                
                                ?>
                                </li>
                            </ul>                        
                        </div>
                        
                    </nav>  

                </div>                                  
            </div>            
        </div>

        <section class="section">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                        <div class="blog-post">
                            <h3 class="gold-text">Choose from our vast range of products</h3>
                                <p>Placeholder</p>
                        </div>
                    </div>
                </div>
            </div>
	    <div class = "container-fluid">
	    	<button type="button" class="product-collapsible product-main-directory">Instruments</button>
            <div class = "product-content">
            <button type="button" class="product-collapsible product-padding">Brass</button>
			    <div class="product-content">
                
                    <?php
                    $hostname="silva.computing.dundee.ac.uk";
                    $dbUsername="19ac3u14";
                    $dbPass="cba123";
                    $dbname="19ac3d14";
                    
                    // connect to the database
                    $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
      
                    $sql = "SELECT * FROM product WHERE Category = 'Brass'";
                    $result = $db->query($sql);
      
                    while($row = $result->fetch_assoc()) 
                    {
                      
                      echo "<table table-layout= auto width= 100% border = 1px solid #ddd padding=10px>";
                      echo "<tr>";
                      echo "<th colspan = '2'> $row[Name] </th>";
                      echo "<th colspan = '6'> Available at the following branches<th>";
                      echo "</tr>";
                      echo "<tr>";
                      echo "<td align = 'center'> <img src=$row[image_link]  class='product-img' </td>";
                      echo "<td> £$row[Price] </td>";
                    
                      $stockID = "SELECT branchstock.BranchId FROM branchstock WHERE ProductId = $row[ProductId] AND Quantity > 0";
                      $stockResult = $db->query($stockID);
                      
                      while($row2 = $stockResult->fetch_assoc())
                      {
                        
                        $getBranchDetails = "SELECT branch.Address, branch.PostCode, branch.phoneNo FROM branch WHERE BranchId = $row2[BranchId]";
                        $branchDetails = $db->query($getBranchDetails);
                        
                        while($row3 = $branchDetails->fetch_assoc())
                        {
                            echo"<td> $row3[Address] <br> $row3[PostCode]</td>";
                        }
                        
                      }
                      
                      echo "</tr>";
                      echo "</table>";
                     }
                    ?>
                    
                </div>
                   
			<button type="button" class="product-collapsible product-padding">Guitars</button>
			<div class="product-content">
                    <?php
                    $hostname="silva.computing.dundee.ac.uk";
                    $dbUsername="19ac3u14";
                    $dbPass="cba123";
                    $dbname="19ac3d14";
                    
                    // connect to the database
                    $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
      
                    $sql = "SELECT * FROM product WHERE Category = 'Guitars'";
                    $result = $db->query($sql);
      
                        while($row = $result->fetch_assoc()) 
                        {
                          
                          echo "<table table-layout= auto width= 100% border = 1px solid #ddd padding=10px>";
                          echo "<tr>";
                          echo "<th colspan = '2'> $row[Name] </th>";
                          echo "<th colspan = '6'> Available at the following branches<th>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td align = 'center'> <img src=$row[image_link]  class='product-img' </td>";
                          echo "<td> £$row[Price] </td>";
                        
                          $stockID = "SELECT branchstock.BranchId FROM branchstock WHERE ProductId = $row[ProductId] AND Quantity > 0";
                          $stockResult = $db->query($stockID);
                          
                          while($row2 = $stockResult->fetch_assoc())
                          {
                            
                            $getBranchDetails = "SELECT branch.Address, branch.PostCode, branch.phoneNo FROM branch WHERE BranchId = $row2[BranchId]";
                            $branchDetails = $db->query($getBranchDetails);
                            
                            while($row3 = $branchDetails->fetch_assoc())
                            {
                                echo"<td> $row3[Address] <br> $row3[PostCode]</td>";
                            }
                            
                          }
                          
                          echo "</tr>";
                          echo "</table>";
                     }
                    ?>
					
			</div>

			<button type="button" class="product-collapsible product-padding">Percussion</button>
			<div class="product-content">
                    <?php
                    $hostname="silva.computing.dundee.ac.uk";
                    $dbUsername="19ac3u14";
                    $dbPass="cba123";
                    $dbname="19ac3d14";
                    
                    // connect to the database
                    $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
      
                    $sql = "SELECT * FROM product WHERE Category = 'Percussion'";
                    $result = $db->query($sql);
      
                        while($row = $result->fetch_assoc()) 
                        {
                          
                          echo "<table table-layout= auto width= 100% border = 1px solid #ddd padding=10px>";
                          echo "<tr>";
                          echo "<th colspan = '2'> $row[Name] </th>";
                          echo "<th colspan = '6'> Available at the following branches<th>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td align = 'center'> <img src=$row[image_link]  class='product-img' </td>";
                          echo "<td> £$row[Price] </td>";
                        
                          $stockID = "SELECT branchstock.BranchId FROM branchstock WHERE ProductId = $row[ProductId] AND Quantity > 0";
                          $stockResult = $db->query($stockID);
                          
                          while($row2 = $stockResult->fetch_assoc())
                          {
                            
                            $getBranchDetails = "SELECT branch.Address, branch.PostCode, branch.phoneNo FROM branch WHERE BranchId = $row2[BranchId]";
                            $branchDetails = $db->query($getBranchDetails);
                            
                            while($row3 = $branchDetails->fetch_assoc())
                            {
                                echo"<td> $row3[Address] <br> $row3[PostCode]</td>";
                            }
                            
                          }
                          
                          echo "</tr>";
                          echo "</table>";
                         }
                    ?>
					
            </div>

            <button type="button" class="product-collapsible product-padding">Pianos & Keyboards</button>
			<div class="product-content">
                    <?php
                    $hostname="silva.computing.dundee.ac.uk";
                    $dbUsername="19ac3u14";
                    $dbPass="cba123";
                    $dbname="19ac3d14";
                    
                    // connect to the database
                    $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
      
                    $sql = "SELECT * FROM product WHERE Category = 'Pianos & Keyboards'";
                    $result = $db->query($sql);
      
                        while($row = $result->fetch_assoc()) 
                        {
                          
                          echo "<table table-layout= auto width= 100% border = 1px solid #ddd padding=10px>";
                          echo "<tr>";
                          echo "<th colspan = '2'> $row[Name] </th>";
                          echo "<th colspan = '6'> Available at the following branches<th>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td align = 'center'> <img src=$row[image_link]  class='product-img' </td>";
                          echo "<td> £$row[Price] </td>";
                        
                          $stockID = "SELECT branchstock.BranchId FROM branchstock WHERE ProductId = $row[ProductId] AND Quantity > 0";
                          $stockResult = $db->query($stockID);
                          
                          while($row2 = $stockResult->fetch_assoc())
                          {
                            
                            $getBranchDetails = "SELECT branch.Address, branch.PostCode, branch.phoneNo FROM branch WHERE BranchId = $row2[BranchId]";
                            $branchDetails = $db->query($getBranchDetails);
                            
                            while($row3 = $branchDetails->fetch_assoc())
                            {
                                echo"<td> $row3[Address] <br> $row3[PostCode]</td>";
                            }
                            
                          }
                          
                          echo "</tr>";
                          echo "</table>";
                         }
                    ?>
					

            </div>

            <button type="button" class="product-collapsible product-padding">Woodwind</button>
			<div class="product-content">
                    <?php
                    $hostname="silva.computing.dundee.ac.uk";
                    $dbUsername="19ac3u14";
                    $dbPass="cba123";
                    $dbname="19ac3d14";
                    
                    // connect to the database
                    $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
      
                    $sql = "SELECT * FROM product WHERE Category = 'Woodwind'";
                    $result = $db->query($sql);
      
                        while($row = $result->fetch_assoc()) 
                        {
                          
                          echo "<table table-layout= auto width= 100% border = 1px solid #ddd padding=10px>";
                          echo "<tr>";
                          echo "<th colspan = '2'> $row[Name] </th>";
                          echo "<th colspan = '6'> Available at the following branches<th>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td align = 'center'> <img src=$row[image_link]  class='product-img' </td>";
                          echo "<td> £$row[Price] </td>";
                        
                          $stockID = "SELECT branchstock.BranchId FROM branchstock WHERE ProductId = $row[ProductId] AND Quantity > 0";
                          $stockResult = $db->query($stockID);
                          
                          while($row2 = $stockResult->fetch_assoc())
                          {
                            
                            $getBranchDetails = "SELECT branch.Address, branch.PostCode, branch.phoneNo FROM branch WHERE BranchId = $row2[BranchId]";
                            $branchDetails = $db->query($getBranchDetails);
                            
                            while($row3 = $branchDetails->fetch_assoc())
                            {
                                echo"<td> $row3[Address] <br> $row3[PostCode]</td>";
                            }
                            
                          }
                          
                          echo "</tr>";
                          echo "</table>";
                         }
                    ?>
			</div>
		</div>
        <button type="button" class="product-collapsible product-main-directory">Miscellaneous</button>
        <div class="product-content">
                <button type="button" class="product-collapsible product-padding">Accessories</button>
                <div class="product-content">
                        <?php
                    $hostname="silva.computing.dundee.ac.uk";
                    $dbUsername="19ac3u14";
                    $dbPass="cba123";
                    $dbname="19ac3d14";
                    
                    // connect to the database
                    $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
      
                    $sql = "SELECT * FROM product WHERE Category = 'Accessories'";
                    $result = $db->query($sql);
      
                
                     while($row = $result->fetch_assoc()) 
                        {
                          
                          echo "<table table-layout= auto width= 100% border = 1px solid #ddd padding=10px>";
                          echo "<tr>";
                          echo "<th colspan = '2'> $row[Name] </th>";
                          echo "<th colspan = '6'> Available at the following branches<th>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td align = 'center'> <img src=$row[image_link]  class='product-img' </td>";
                          echo "<td> £$row[Price] </td>";
                        
                          $stockID = "SELECT branchstock.BranchId FROM branchstock WHERE ProductId = $row[ProductId] AND Quantity > 0";
                          $stockResult = $db->query($stockID);
                          
                          while($row2 = $stockResult->fetch_assoc())
                          {
                            
                            $getBranchDetails = "SELECT branch.Address, branch.PostCode, branch.phoneNo FROM branch WHERE BranchId = $row2[BranchId]";
                            $branchDetails = $db->query($getBranchDetails);
                            
                            while($row3 = $branchDetails->fetch_assoc())
                            {
                                echo"<td> $row3[Address] <br> $row3[PostCode]</td>";
                            }
                            
                          }
                          
                          echo "</tr>";
                          echo "</table>";
                         }
                     
                    ?>
                        
                </div>
                
                <button type="button" class="product-collapsible product-padding">Cases</button>
			    <div class="product-content">
                        <?php
                    $hostname="silva.computing.dundee.ac.uk";
                    $dbUsername="19ac3u14";
                    $dbPass="cba123";
                    $dbname="19ac3d14";
                    
                    // connect to the database
                    $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
      
                    $sql = "SELECT * FROM product WHERE Category = 'Cases'";
                    $result = $db->query($sql);
      
                        while($row = $result->fetch_assoc()) 
                        {
                          
                          echo "<table table-layout= auto width= 100% border = 1px solid #ddd padding=10px>";
                          echo "<tr>";
                          echo "<th colspan = '2'> $row[Name] </th>";
                          echo "<th colspan = '6'> Available at the following branches<th>";
                          echo "</tr>";
                          echo "<tr>";
                          echo "<td align = 'center'> <img src=$row[image_link]  class='product-img' </td>";
                          echo "<td> £$row[Price] </td>";
                        
                          $stockID = "SELECT branchstock.BranchId FROM branchstock WHERE ProductId = $row[ProductId] AND Quantity > 0";
                          $stockResult = $db->query($stockID);
                          
                          while($row2 = $stockResult->fetch_assoc())
                          {
                            
                            $getBranchDetails = "SELECT branch.Address, branch.PostCode, branch.phoneNo FROM branch WHERE BranchId = $row2[BranchId]";
                            $branchDetails = $db->query($getBranchDetails);
                            
                            while($row3 = $branchDetails->fetch_assoc())
                            {
                                echo"<td> $row3[Address] <br> $row3[PostCode]</td>";
                            }
                            
                          }
                          
                          echo "</tr>";
                          echo "</table>";
                         }
                     
                    ?>
			    </div>

	    </div>
	<script>
		var coll = document.getElementsByClassName("product-collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener("click", function() {
 		   this.classList.toggle("product-active");
		   var content = this.nextElementSibling;
		   if (content.style.display === "block") {
		      content.style.display = "none";
		   } else {
      			content.style.display = "block";
   		   }
  		});
		}
	</script>
	</section>
 
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="footer-content-box">
                            <h3 class="title footer-content-box-title">Social</h3>
                            <ul class="nav">
                                <li>Twitter: @MurrayBeats</li>
                                <li>Facebook: MurrayBeats</li>
                                <li>Instagram @MurrayBeats</li>
                            </ul>   
                        </div>
                        
                                                
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="footer-content-box footer-links-container">
                            <h3 class="title footer-content-box-title">Shipping and Returns</h3>
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
                            <h3 class="title footer-content-box-title">Leave a Review</h3>
                            <ul class="nav">
                                <li>TrustPilot: TrustPilot.com/BBM</li>
                            </ul> 
                            <!--<a href="#" class="btn btn-gray text-uppercase">Read More</a>-->
                        </div>
                        
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                        <div class="footer-content-box">
                        
                            <h3 class="title footer-content-box-title">Support</h3>
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
</div>
</body>
</html>
