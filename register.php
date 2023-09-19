<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Email:</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password:</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password:</label>
  	  <input type="password" name="password_2">
  	</div>
	  <div class="input-group">
	  <label>Name:</label>
  	  <input type="text" name="name">
  	</div>
  	<div class="input-group">
  	  <label>Address:</label>
  	  <input type="text" name="address" >
  	</div>
  	<div class="input-group">
  	  <label>postcode:</label>
  	  <input type="text" name="postcode" pattern="(?:[A-Za-z]\d ?\d[A-Za-z]{2})|(?:[A-Za-z][A-Za-z\d]\d ?\d[A-Za-z]{2})|(?:[A-Za-z]{2}\d{2} ?\d[A-Za-z]{2})|(?:[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]{2})|(?:[A-Za-z]{2}\d[A-Za-z] ?\d[A-Za-z]{2})"required > <i>(e.g: DD14HN or DD1 4HN)</i>
  	</div>
      <div class="input-group">
  	  <label>Phone Number:</label>
  	  <input type="tel" name="phoneNo" pattern="[0-9]{11}"required><i>(e.g: 07666666666)</i>
        <div class="input-group">
  	  <label>Date of Birth:</label>   
    <input type="date" name="DOB" data-date="" data-date-format="YYYY-MMMM-DD" value="2019-08-09">
      </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>