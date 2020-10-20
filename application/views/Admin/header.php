<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <?= link_tag("Assets/css/bootstrap.min.css") ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Article List</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    
  </button>

   
  <!-- <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>users">Home <span class="sr-only">(current)</span></a>
      </li>
     </ul>
  </div>     -->
  <?php 
   
   if($this->session->userdata('id')){
    ?>
   <li>
     <a href="<?php echo base_url('admin/logout') ?>" class="btn btn-danger" style="">Logout</a>
   </li>
   <?php
   }
   else{
     ?>
      <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>users"><h4>Guest Login </h4><span class="sr-only">(current)</span></a>
      </li>
     </ul>
  </div>    
   <?php }
  ?>
</nav>