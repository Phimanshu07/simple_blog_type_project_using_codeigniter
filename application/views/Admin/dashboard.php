<?php include('header.php') ?>


<div class="container" style="  margin-top:50px";>
  <div class="row">
    <div class="mx-auto w-52 p-3 text-align:center">
    <a href="adduser" class="btn btn-lg btn-primary">Add Articles</a>
    </div>
    
  </div>
</div>



<div class="container" >
  <div class="row">
    <div class="mx-auto w-52 p-3 text-align:center">
       <?php if($msg=$this->session->flashdata('msg')): 
         $msg_class=$this->session->flashdata('msg_class')
       ?>
      <div class="form-row text-center">
        <div class="col-lg-12">
          <div class="alert <?= $msg_class ?>">
            <?php echo $msg; ?>

          </div>
        </div>
   </div>
     <?php endif; ?>
    </div>
    
  </div>
</div>


<div class="container" style="margin-top:50px";>
  
 <div class="table">
   <table class="table table-bordered table-md ">
   <thead>
     <tr>
       <!--<th>ID</th>-->
       <th style="text-align:center";>Article Title</th>
       <th style="text-align:center";>Edit</th>
       <th style="text-align:center";>Delete</th>
     </tr>
    </thead> 

    <tbody>
   <?php  if(count((array)$articles)):
      
      //$count=$this->uri->segment(3);
    ?>
    <?php foreach($articles as $art):  ?>
      <tr>
     <!-- <td style="text-align:center";><?php echo ++$count; ?></td> -->
        <td style="text-align:center";><?php echo $art->article_title; ?></td>
        <td style="text-align:center";><?=  anchor("admin/edituser/{$art->id}",'Edit',['class'=>'btn btn-primary']);  ?></td>

        
        <td style="text-align:center";>
        
        <?=
        
        form_open('admin/delete'),
        form_hidden('id',$art->id),
        form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
        form_close();
        ?>
        
        
      </tr>
    <?php endforeach; ?>

    <?php else: ?>
      <tr>
       <td style="text-align:center"; colspan="4">Data Not Available</td>
      </tr>
    
    <?php endif; ?>
    </tbody>

    
   </table>
   <div style="text-align:center";>
     <!-- <?php echo $this->pagination->create_links(); ?> -->
      </div>
 </div>
</div>
<?php include('footer.php') ?>