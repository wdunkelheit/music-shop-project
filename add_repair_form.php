     <?php
       $hostname="silva.computing.dundee.ac.uk";
       $dbUsername="19ac3u14";
       $dbPass="cba123";
       $dbname="19ac3d14";
       // connect to the database
       $db = mysqli_connect($hostname, $dbUsername, $dbPass, $dbname);
         $resultSet= $db->query("SELECT Category FROM Product");
         $customerID= $db->query("SELECT CustomerID FROM customer");
      ?>
     <label>Select Branch</label>
     

<div class="form-group">
 <label>Enter Item Name:</label>
 <input type="text" name="name" id="name" maxlength="80" class="form-control">   <i>(e.g: Electric Guitar) - Max 30 Characters</i>
</div>
<div class="form-group">
 <label>Enter Item Type:</label>
<select name="itemType" id="itemType" class="form-control">
      <?php
           while ($row = mysqli_fetch_assoc($resultSet)) {
               $itemType= $row['Category'];
               echo"<option value='$itemType'>$itemType</option>";
           }
      ?>
      <option value="Other">Other</option>
     </select>

</div>
<div class="form-group">
 <label>Start Date:</label>
<input type="date" name="startdate" data-date="" data-date-format="YYYY-MMMM-DD" value="2019-11-01">
</div>
<div class="form-group">
 <label>End Date:</label>
<input type="date" name="enddate" data-date="" data-date-format="YYYY-MMMM-DD" value="2019-11-01">
</div>
<div class="form-group">
 <label>Customer Account ID</label>
 <select>
   <?php
           while ($row = mysqli_fetch_assoc($customerID)) {
               $ID= $row['CustomerID'];
               echo"<option value='$ID'>$ID</option>";
           }
      ?>
     </select>
</div>

  