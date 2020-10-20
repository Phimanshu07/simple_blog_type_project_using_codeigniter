
<?php include('header.php'); ?>

<div class="container" style="margin-top:20px">
    <h1 style="text-align:center">Add Artilces</h1>


    <?php echo form_open_multipart('admin/uservalidation'); ?>
    <?php echo form_hidden('user_id',$this->session->userdata('id')); ?>
    <?php echo form_hidden('created_at',date('Y-m-d H:i:s')); ?>
    <div class="row">
       <div class="col-lg-12"> 
         <div class="form-group">
            <label for="Title">Article Title:</label>
  
             <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Title','name'=>'article_title','value'=>set_value('article_title')]); ?>
         </div>
      </div>
    </div>
 
 <div>
   <span class="text-danger"><?= form_error('article_title') ?></span>
 </div>

 <div class="row">
   <div class="col-lg-12"> 
      <div class="form-group">
         <label for="Body">Article Body:</label>
           <?php echo form_textarea(['name'=>'article_body','class'=>'form-control','placeholder'=>'Enter Article Body','id'=>'body','value'=>set_value('article_body'),'type'=>'password']); ?>
      </div>
    </div>
 </div>
 
 <div>
    <span class="text-danger"><?= form_error('article_body') ?></span>
  
 </div>

 <div class="row">
   <div class="col-lg-12"> 
     <div class="form-group">
      <label for="Body">Select Image:</label>
      <?php echo form_upload(['name'=>'userfile']); ?>
     </div>
  </div>
 <div>
    <span class="text-danger"><?php  if(isset($upload_error)):
    echo $upload_error; ?>
    </span><?php endif; ?>
  
 </div>
 </div>
 

 <div class="form-row text-center">
    <div class="col-12">
      <?php echo form_submit(['type'=>'submit','class'=>'btn btn-secondary','value'=>'Submit']); ?> 

        <?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset']); ?> 

     </div>
 </div>
</div>

<?php include('footer.php') ?>