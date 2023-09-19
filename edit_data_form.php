<div class="form-group">
 <label>Enter Customer Name</label>
 <input type="text" name="name" id="name" class="form-control" />
</div>
<div class="form-group">
 <label>Enter Customer Address</label>
 <textarea name="address" id="address" class="form-control"></textarea>
</div>
<div class="form-group">
 <label>Enter Postcode </label>
 <input type="text" name="PostCode" id="PostCode" class="form-control" pattern="(?:[A-Za-z]\d ?\d[A-Za-z]{2})|(?:[A-Za-z][A-Za-z\d]\d ?\d[A-Za-z]{2})|(?:[A-Za-z]{2}\d{2} ?\d[A-Za-z]{2})|(?:[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]{2})|(?:[A-Za-z]{2}\d[A-Za-z] ?\d[A-Za-z]{2})"required > <i>(e.g: DD14HN or DD1 4HN)</i>
</div>
<div class="form-group">
 <label>Enter Phone Number</label>
 <input type="tel" name="phoneNo" id="phoneNo" class="form-control" pattern="[0-9]{11}"required><i>(e.g: 07666666666)</i>
</div>
<div class="form-group">
 <label>Enter Date of Birth</label>
 <input type="date" name="DOB" id="DOB" class="form-control" data-date="" data-date-format="YYYY-MMMM-DD" value="2019-08-09">
</div>



<script>
 $(document).ready(function () {

  var name = localStorage.getItem('Name');
  var address = localStorage.getItem('Address');
  var PostCode = localStorage.getItem('PostCode');
  var phoneNo = localStorage.getItem('phoneNo');
  var DOB = localStorage.getItem('DateOfBirth');
 

  $('#name').val(name);
  $('#address').val(address);
  $('#PostCode').val(PostCode);
  $('#phoneNo').val(phoneNo);
  $('#DOB').val(DOB);

 

 });
</script>
