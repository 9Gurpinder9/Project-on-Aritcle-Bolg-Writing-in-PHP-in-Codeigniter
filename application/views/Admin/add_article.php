
<?php include("header.php")?>

<?php echo form_open_multipart('admin/userValidation');?>

<div class="container" style="margin-top: 20px;">
	<h1>Add Articles</h1>

 <?php echo form_hidden('user_id',$this->session->userdata('id'));?>
<?php echo form_hidden('date',date('Y-m-d H:i:s'));?>
  <div class="row">
    <div class="col-lg-6">
  <div class="form-group">
    <label>Article Title</label>
    <?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Enter Article Title','name'=>'article_title','value'=>set_value('article_title')]);?>
    
  </div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
<?php echo form_error('article_title'); ?>
</div>
</div>
 <div class="row">
    <div class="col-lg-6">
  <div class="form-group">
    <label>Article Body</label>
    
<?php echo form_textarea(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Article Body','name'=>'article_body','value'=>set_value('article_body')]);?>
  </div>
</div>
    <div class="col-lg-6" style="margin-top: 40px;">
<?php echo form_error('article_body'); ?>
</div>
</div>
<div class="row">
<div class="col-lg-6">
 <div class="form-group">
    <label><b>Select Image</b></label><br>
      <?php echo form_upload(['name'=>'userfile']); ?>
    </div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
  <?php if(isset($upload_error)){echo $upload_error;}?>
  </div>
  </div>
 <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Add']);?>

 <?php echo form_reset(['type'=>'reset','class'=>'btn btn-default','value'=>'Reset']);?>
 
  <div class="row">
    <div class="col-lg-6" style="margin-top:20px;">
      © 2019 Copyright 2019 <a href="https://www.webcreaterz.com/">WebCreaterz</a>

    </div>
  </div>
</div>
<?php //echo validation_errors(); ?>
<?php include("footer.php")?>