<?php include('header.php'); ?>

<div class="container" style="margin-top:50px;">
<h1 align="center"><?= $title;  ?></h1>
<div class="table-responsive"  style="margin-top:50px;"  >
    <table class="table table-hover  table-bordered  tablesorter">
        <thead>
            <tr>
                <th class="header">S.no</th>
                <th class="header">Full Name</th>                           
                <th class="header">Email</th>                      
                <th class="header">Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ctr=0;
            foreach($feedbackInfo as $row)
                {
                    $ctr++;
                    ?>
                    <tr>
                     <td><?php echo $ctr; ?></td>
                        <td><?php echo $row->name; ?></td>   
                        <td><?php echo $row->email; ?></td> 
                        <td><?php echo $row->feedback1; ?></td>                       
                        
                    </tr>
                  
            <?php } ?>

        </tbody>
    </table>
  


  <!--   <a class="pull-right btn btn-primary btn-xs" href="<?php echo base_url()?>export/createxls"><i class="fa fa-file-excel-o"></i> Export Data</a> -->
</div> 
</div>
<div align="center">
    <form method="post" action="<?php echo base_url(); ?>export/createXLS">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>
<?php include('footer.php'); ?>