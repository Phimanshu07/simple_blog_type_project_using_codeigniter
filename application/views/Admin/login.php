
<?php include('header.php'); ?>


 


<div class="container" style="margin-top:20px">
<h1 style="text-align:center">Admin Form</h1>

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

<?php if($error=$this->session->flashdata('Login_Failed!')): ?>
<div class="form-row text-center">
   <div class="col-lg-12">
   <div class="alert alert-danger">
   <?php echo $error; ?>

   </div>
   </div>
   </div>
<?php endif; ?>
<?php echo form_open('login/index'); ?>
 
 <div class="row">
 <div class="col-lg-12"> 
 <div class="form-group">
 <label for="Username">Username:</label>
  
  <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'uname','value'=>set_value('uname')]); ?>
 </div>
 </div>
 </div>
 <div>
 <span class="text-danger"><?= form_error('uname') ?></span>
 </div>

 <div class="row">
 <div class="col-lg-12"> 
 <div class="form-group">
 <label for="Password">Password:</label>
 <?php echo form_password(['name'=>'pwd','class'=>'form-control','placeholder'=>'Enter Password','id'=>'pwd','value'=>set_value('pwd'),'type'=>'password']); ?>
 </div>
 </div>
 </div>
 <div>
    <span class="text-danger"><?= form_error('pwd') ?></span>
  
 </div>
 <div class="form-row text-center">
<div class="col-12">
<?php echo form_submit(['type'=>'submit','class'=>'btn btn-secondary','value'=>'Submit']); ?> 

<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']); ?> 
<?php echo anchor('login/register','sign up?','class="link-class"'); ?> 
</div>
</div>
</div>

<?php include('footer.php') ?>