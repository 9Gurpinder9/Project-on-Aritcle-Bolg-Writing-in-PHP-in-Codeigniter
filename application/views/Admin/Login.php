
<?php include("header.php")?>


<div class="container" style="margin-top: 20px;">
	<h1>Admin From</h1>
  <?php 

if($error=$this->session->flashdata('Login_failed')) :
  ?>
<div class="row">
<div class="col-lg-6">
<div class="alert alert-danger">
<?= $error; ?>
  </div>
</div>
</div>
<?php endif; ?> 
	<?php echo form_open('login');?>
  <div class="row">
    <div class="col-lg-6">
  <div class="form-group">
    <label>Username</label>
    <?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Enter Username','name'=>'uname','value'=>set_value('uname')]);?>
    
  </div>
</div>
  <div class="col-lg-6" style="margin-top: 40px;">

  <?php echo form_error('uname');?>
</div>
</div>
 <div class="row">
    <div class="col-lg-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    
<?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'pass','value'=>set_value('pass')]);?>
  </div>
</div>
    <div class="col-lg-6" style="margin-top: 40px;">
      <?php echo form_error('pass');?>
  </div>
</div>
 <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']);?>

 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-default','value'=>'Reset']);?>

 <?php echo anchor('admin/register','Sign Up?','class="link-class"');?>
 
  <div class="row">
    <div class="col-lg-6" style="margin-top:20px;">
      © 2019 Copyright 2019 <a href="https://www.webcreaterz.com/">WebCreaterz</a>

    </div>
  </div>
</div>
<?php //echo validation_errors(); ?>
<?php include("footer.php")?>