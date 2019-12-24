<?php include("header.php")?>
	<div class="container" style="margin-top: 50px;">
		<div class="row">

			<div class="col-lg-12 text-center">
         <h2>Encryption In CodeIgniter</h2>
     </div>
     <div class="col-lg-12">
 <div class="form-group">
     
   <label>Enter Email</label>
   <input type="text" name="email" id="email" class="form-control">
   <span id="email_result">
   	
   </span>
     </div>
 </div>

     </div>
     </div> 

     <script>
     	$(document).ready(function(){
$('#email').change(function(){
var email=$('#email').val();
if(email != ''){
$.ajax({
url:"<?php echo base_url(); ?>admin/check_email_avalibility",
method:"POST",
data:{email:email},
success:function(data)
{	
	$('#email_result').html(data);
}
});
}
});
     	});
     </script> 
<?php include("footer.php")?>