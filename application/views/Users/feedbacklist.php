
<?php include("header.php")?>

<div class="container" style="margin-top: 20px;">
<h1><?= $title;?></h1>
<div class="row">
	<div class="table-responsive">
<table class="table table-hover tablesorter">
<thead>
<tr>
	<th class="header">Serial No.</th>
	<th class="header">Full Name</th>
	<th class="header">Email</th>
	<th class="header">Feedback</th>
</tr>
</thead>
<tbody>
	<?php 
     $counter=0;
     // echo"<pre>";
     // print_r($feedbackInfo);
     foreach($feedbackInfo as $row) {
     
     	$counter++;
	?>
<tr>
<td><?= $counter;?></td>
<td><?= $row->name; ?></td>
<td><?= $row->email;?></td>
<td><?= $row->feedback1;?></td>
</tr>

<?php } ?>
	</tbody>
</table>
<div align="center">
<form method="post" action="<?php echo base_url(); ?>export/createXLS" >
<input type="submit" name="export" class="btn btn-success" value="Export">
</form>
	</div>
	</div>
</div>
<div class="row">
    <div class="col-lg-6" style="margin-top:20px;">
      © 2019 Copyright 2019 <a href="https://www.webcreaterz.com/">WebCreaterz</a>

    </div>
  </div>
</div>

<?php include("footer.php")?>