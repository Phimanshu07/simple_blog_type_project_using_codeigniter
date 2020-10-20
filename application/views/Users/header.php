<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?= link_tag("Assets/css/bootstrap.min.css") ?>
    <title>Article List</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
  <a class="navbar-brand" href="<?php echo base_url() ?>users"><h1>Menu</h1></a>
    <span class="navbar-toggler-icon"></span>
  </button>
   
   
  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>users"><h1>Home</h1> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url() ?>export"><h1>User Feedback</h1> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>dynamic_dependent"><h1>Dropdown</h1></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>login"><h1>Admin Login</h1></a>
      </li>
      
    </ul>
    
  </div>
  
</nav>