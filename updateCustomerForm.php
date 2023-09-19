<div class="form-group">
 <label> Name</label>
 <input type="text" name="name" id="name" class="form-control" />
</div>
<div class="form-group">
 <label> Address</label>
 <textarea name="address" id="address" class="form-control"></textarea>
</div>
<div class="form-group">
 <label>Postcode</label>
 <input type="text" name="postcode" id="postcode" class="form-control" />
 </div>
<div class="form-group">
 <label>Phone Number</label>
 <input type="text" name="phoneno" id="phoneno" class="form-control" />
</div>
<div class="form-group">
 <label>Date of Birth</label>
 <input type="text" name="DOB" id="DOB" class="form-control" />
</div>

<script>
 $(document).ready(function () {

  var name = localStorage.getItem('name');
  var address =  localStorage.getItem('address');
  var postcode = localStorage.getItem('postcode');
  var phoneno =  localStorage.getItem('phoneno');
  var DOB = localStorage.getItem('DOB');
 

 

 $('#name').val(name);
  $('#address').val(address);
  $('#postcode').val(postcode);
  $('#phoneno').val(phoneno);
  $('#DOB').val(DOB);

  

 });
</script>