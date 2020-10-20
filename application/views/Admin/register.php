
<?php include('header.php') ?>
<div class="container" style="margin-top:20px">
<h1 style="text-align:center">Registeration  Form</h1>


<div class="container" >
  <div class="row">
    <div class="mx-auto w-52 p-3 text-align:center">
    <?php if($user=$this->session->flashdata('user')): 
      $user_class=$this->session->flashdata('user_class')
      ?>
   <div class="form-row text-center">
   <div class="col-lg-12">
   <div class="alert <?= $user_class ?>">
   <?php echo $user; ?>

   </div>
   </div>
   </div>
<?php endif; ?>
    </div>
    
  </div>
</div>


<?php echo form_open('login/sendemail'); ?>
 
 <div class="row">
 <div class="col-lg-12"> 
 <div class="form-group">
 <label for="Username">Username:</label>
  
  <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'username','value'=>set_value('username')]); ?>
 </div>
 </div>
 </div>
 <div>
 <span class="text-danger"><?= form_error('username') ?></span>
 </div>

 <div class="row">
 <div class="col-lg-12"> 
 <div class="form-group">
 <label for="Password">Password:</label>
 <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Enter Password','id'=>'pwd','value'=>set_value('password'),'type'=>'password']); ?>
 </div>
 </div>
 </div>
 <div>
    <span class="text-danger"><?= form_error('password') ?></span>
  
 </div>

 <div class="row">
 <div class="col-lg-12"> 
 <div class="form-group">
 <label for="First Name">First Name:</label>
 <?php echo form_input(['autocomplete'=>'off','name'=>'firstname','class'=>'form-control','placeholder'=>'Enter FirstName','id'=>'firstname','value'=>set_value('firstname')]); ?>
 </div>
 </div>
 </div>
 <div>
    <span class="text-danger"><?= form_error('firstname') ?></span>
  
 </div>

 <div class="row">
 <div class="col-lg-12"> 
 <div class="form-group">
 <label for="Last Name">Last Name:</label>
 <?php echo form_input(['name'=>'lastname','class'=>'form-control','placeholder'=>'Enter LastName','id'=>'lastname','value'=>set_value('lastname')]); ?>
 </div>
 </div>
 </div>
 <div>
    <span class="text-danger"><?= form_error('lastname') ?></span>
  
 </div>

 <div class="row">
 <div class="col-lg-12"> 
 <div class="form-group">
 <label for="Email">Email:</label>
 <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter Email','id'=>'email','value'=>set_value('email')]); ?>
 </div>
 </div>
 </div>
 <div>
    <span class="text-danger"><?= form_error('email') ?></span>
  
 </div>
 
<div class="form-row text-center">
<div class="col-12">
<?php echo form_submit(['type'=>'submit','class'=>'btn btn-secondary','value'=>'Submit']); ?> 

<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']); ?> 
</div>
</div>
</div>


<?php include('footer.php') ?>