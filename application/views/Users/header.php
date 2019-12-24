<html>
<head>
<title>Article List</title>
<!--<link href="<?= base_url("Assets/css/bootstrap.min.css")  ?>" rel="stylesheet"> -->

<?= link_tag("Assets/css/bootstrap.min.css");?>
<link rel="icon" href="<?= base_url("Assets/img/favicon-32x32.png");?>">
<script src="<?php echo base_url(); ?>Assets/js/jquery-3.2.1.min.js">
  </script>
	<script src="<?php echo base_url(); ?>Assets/js/bootstrap.min.js"> 
  </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo base_url();?>users/index">Article List</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a href="<?php echo base_url();?>export" class="nav-link">
       User Feedback
       </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>Dynamic_dependent">
       Demo View Country,State,City
       </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/index">
       Admin Login
       </a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/check_email">
       Check Email Availablitity Using Ajax
       </a>
      </li>
    </ul>
   
  </div>
</nav>