<?php include('header.php'); ?>
<script>
  $(document).ready(function(){
    $("#myinput").on("keyup",function(){
      var value=$(this).val().toLowerCase();
      $("#mytable tr").filter(function(){
        $(this).toggle($(this).text().toLowerCase().indexOf(value)> -1)
      });
    });
  });
</script>

<div class="container">
<div class="row">
<div class="mx-auto text-align:center">
<div  class="col-lg-12">

<form class="form-inline">
  
     <h1 >
    <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="myinput">
    <button class="btn btn-outline-primary" type="submit">Search</button>
    </h1>
    
  </form>
  </div> 
  </div>
</div>
</div>

<div class="container" style="margin-top:20px;">
 <div class="row">
 <div class="mx-auto text-align:center">
<h1  >All Articles</h1>
 </div>
  <table class="table table-bordered ">
<thead >
<tr>
<th>S.no</th>
<th>Article Image</th>
<th>Article Title</th>

<th>Published On</th>
</tr>
</thead>
<tbody id="mytable">
<?php if(count((array)$articles)):
 $count=$this->uri->segment(3); 

 ?> 
<?php foreach((array)$articles as $art): ?>
<tr>
	   
        <td><?=    ++$count; ?></td>
        
        <?php if(!is_null($art->image_path)) { ?>
        <td><img src="<?php echo $art->image_path ?>" alt="" width="280" height="200"></td>
        <?php
         }
       
       ?>

		<td><?= anchor("admin/{$art->id}", $art->article_title); ?></td>
		<td><?= date('d M y H:i:s',strtotime($art->created_at)) ?></td>
		
		
	</tr>
	   <?php endforeach; ?>
     <?php else: ?>
	<tr>
	   <td colspan="4">Not data available</td>
	</tr>
   <?php endif; ?>
 </tbody>
 </table>

 <div class="container">
 <div class="row">
 
 <div class="mx-auto w-52 p-3 text-align:center">
      <?php  echo $this->pagination->create_links();   ?> 
 
 </div>
 </div>
</div>
 </div>
 
</div>


<?php include('footer.php'); ?>