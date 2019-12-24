
<?php include("header.php")?>
<div class="container" style="margin-top: 100px;">

	<div class="row">
    <div class="col-lg-12 text-center">
      <h3>Codeigniter Dynamic Dependent Select Box using Ajax</h3>
</div>
<div class="col-lg-4">
</div>
<div class="col-lg-5">
    <div class="form-group">
      <label for="exampleSelect1">Country</label>
      <select class="form-control" id="country" name="country">
        <option>--Select--</option>
        <?php
        foreach($country as $row)
        {
          echo'<option value="'.$row->ct_id.'">'.$row->ct_name.'</option>';
        }
        ?>
      </select>
    </div>
  </div>
  <div class="col-lg-3">
</div>
<div class="col-lg-4">
</div>
<div class="col-lg-5">
    <div class="form-group">
      <label for="exampleSelect1">State</label>
      <select class="form-control" name="state" id="state">
        <option>--Select--</option>
      </select>
    </div>
  </div>
  <div class="col-lg-3">
</div>
<div class="col-lg-4">
</div>
<div class="col-lg-5">
    <div class="form-group">
      <label for="exampleSelect1">City</label>
      <select class="form-control" id="city" name="city">
        <option>--Select--</option>
      </select>
    </div>
  </div>
  <div class="col-lg-3">
</div>
     </div>
    </div>
<script>
$(document).ready(function(){
$('#country').change(function(){
var ct_id=$('#country').val();
// alert(ct_id);
// exit;
if(ct_id !='')
{
$.ajax({
url:"<?php echo base_url(); ?>dynamic_dependent/fetch_state",
method:"POST",
data:{ct_id:ct_id},
success:function(data)
{
$('#state').html(data);
$('#city').html('<option value="">Select City</option>');  
}
});
}
else
{
$('#state').html('<option value="">Select State</option>');
$('#city').html('<option value="">Select City</option>');
}
});

$('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>dynamic_dependent/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#city').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });

     });
     </script>
<?php include("footer.php")?>