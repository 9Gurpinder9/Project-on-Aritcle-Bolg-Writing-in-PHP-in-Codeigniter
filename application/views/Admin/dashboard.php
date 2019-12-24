<?php include("header.php")?>
<?php //print_r($articles); ?>
<div class="container" style="margin-top: 20px;">
<div class="row">
	<div class="col-lg-4">
	<?= anchor('admin/adduser','Add Articles',['class'=>'btn btn-lg btn-primary']); ?>
	<!--<a href="adduser" class="btn btn-lg btn-primary">Add Articles</a>-->
</div>
</div>
</div>

<div class="container" style="margin-top: 20px;">
	<?php 

if($msg=$this->session->flashdata('msg')) :
	$msg_class=$this->session->flashdata('msg_class');
  ?>
<div class="row">
<div class="col-lg-6" style="margin-top: 20px;">
<div class="alert <?= $msg_class?>">
<?= $msg; ?>
  </div>
</div>
</div>
<?php endif; ?>

<?php //echo $this->db->last_query(); ?>
<div class="table">
<table>
	<thead>
<tr>
	<th>Serial No.</th>
	<th>Article Title</th>
	<th>Article Body</th>
	<th>Edit </th>
	<th>Delete</th>
</tr>
</thead>
<tbody>
	<?php if(count($articles)) :
       $counter=$this->uri->segment(3);
		?>
		
	<?php 
     
	foreach($articles as $art) :
       $counter++;
       
		?>
	<tr>
		<td><?= $counter;?></td>
		<td><?= $art->article_title; ?>	
		</td>
		<td><?= $art->article_body; ?>
			
		</td>
		<td>
			<?=  anchor("admin/editArticles/{$art->id}",'Edit',['class'=>'btn btn-primary']);  ?>
			</td>
			<td>

          <?=

           form_open('admin/delArticles'),
           form_hidden('id',$art->id),
           form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
           form_close();

			?>	

			</td>
	</tr>
<?php endforeach; ?>
<?php else:?>
<tr>
<td colspan="3">Not Data Available</td>
</tr>
<?php endif; ?>

	</tbody>

</table>
<?php  echo $this->pagination->create_links();   ?>
</div>

<div class="row">
    <div class="col-lg-6" style="margin-top:20px;">
      © 2019 Copyright 2019 <a href="https://www.webcreaterz.com/">WebCreaterz</a>

    </div>
  </div>
</div>
<?php //echo validation_errors(); ?>
<?php include("footer.php")?>