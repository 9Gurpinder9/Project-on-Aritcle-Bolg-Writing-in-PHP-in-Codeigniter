
<?php include("header.php")?>

<?php echo form_open("admin/updateArticle/{$article->id}");?>
<!-- <?php echo form_hidden('articleid',$article->id);?> -->

<div class="container" style="margin-top: 20px;">
	<h1>Edit Articles</h1>

  <div class="row">
    <div class="col-lg-6">
  <div class="form-group">
    <label>Article Title</label>
    <?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Enter Article Title','name'=>'article_title','value'=>set_value('article_title',$article->article_title)]);?>
    
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
    
<?php echo form_textarea(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Article Body','name'=>'article_body','value'=>set_value('article_body',$article->article_body)]);?>
  </div>
</div>
    <div class="col-lg-6" style="margin-top: 40px;">
<?php echo form_error('article_body'); ?>
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