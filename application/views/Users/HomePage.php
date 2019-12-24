
<?php include("header.php")?>

<script>
  
  $(document).ready(function(){
$('#myInput').on("keyup",function(){
var value= $(this).val().toLowerCase();
$('#myTable tr').filter(function(){
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
  });

</script>
<div class="container" style="margin-top: 20px;">

	<div class="row">
     <div class="col-lg-12">
        <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" id="myInput">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
     </div>
	</div>
  <div class="row">
    <div class="col-lg-12 text-center">
<h1>All Articles</h1>
</div>
<table class="table table-bordered" id="myTable">
<thead>
<tr>
<th>Sr. no.</th>
<th>Article Image</th>
<th>Article Title</th>
<th>Published On</th>
</tr>
</thead>
<tbody>
  <?php if(count($articles)) :
        $count=$this->uri->segment(3);
    ?>
    <?php foreach($articles as $art):?>
      <tr>
        <td><?= ++$count;?></td>
        <?php if(!is_null($art->image_path)){ ?>
         <td> 
          <img src="<?php echo $art->image_path; ?>" alt="article" width="280" height="200">
        </td>
      <?php } ?>
      <td><?= anchor('admin/{$art->id}',$art->article_title);?></td>
      <td><?= date('d M y H:i:s',strtotime($art->date));?></td>
      </tr>
   
<?php endforeach; ?>
 <?php endif;?>
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

<?php include("footer.php")?>