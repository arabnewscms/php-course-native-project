<?php
view('admin.layouts.header',['title'=>trans('admin.categories').'-'.trans('admin.edit')]);

 
$category = db_find('categories', request('id'));

redirect_if(empty($category),aurl('categories'));

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>  <?php echo  trans('admin.categories') ; ?> - <?php echo  trans('admin.edit') ; ?></h2>
<a class="btn btn-info" href="<?php echo  aurl('categories') ; ?>"><?php echo  trans('admin.categories') ; ?></a>      
</div>

<?php if(any_errors()): ?>
<div class="alert alert-danger">
	<ol>
		<?php foreach(all_errors() as $error): ?>
					<li><?php echo $error ?></li>
		<?php endforeach; ?>
		</ol>
	</div>
<?php endif; ?>

<?php 
$name = get_error('name');
$icon = get_error('icon');
$description = get_error('description');
end_errors();
 
 ?>  

  <form method="post" action="<?php echo aurl('categories/edit?id='.$category['id'] ); ?>" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="post" />
    <div class="row">
        <div class="col-md-6">
        <div class="form-group">
          <label for="name"><?php echo trans('cat.name'); ?></label>
          <input type="text" name="name" placeholder="<?php echo trans('cat.name'); ?>"  class="form-control <?php echo  !empty($name)?'is-invalid':'' ; ?>" value="<?php echo  $category['name'] ; ?>" />
         </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
          <label for="icon"><?php echo trans('cat.icon'); ?></label>
          <input type="file" name="icon" placeholder="<?php echo trans('cat.icon'); ?>"  class="form-control <?php echo  !empty($icon)?'is-invalid':'' ; ?>"  />

        
<!-- Button trigger modal -->
<img src="<?php echo  storage_url($category['icon']) ; ?>" data-bs-toggle="modal" data-bs-target="#showImage" style="width:25px;height:25px;cursor:pointer" />
 
 <!-- Modal -->
 <div class="modal fade" id="showImage" tabindex="-1" aria-labelledby="showImageLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-body">
       <img src="<?php echo  storage_url($category['icon']) ; ?>" style="width:100%;height:80%;" />
       </div>
     </div>
   </div>
 </div> 
 
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
          <label for="description"><?php echo trans('cat.desc'); ?></label>
          <textarea name="description" placeholder="<?php echo trans('cat.desc'); ?>"  class="form-control <?php echo  !empty($description)?'is-invalid':'' ; ?>"><?php echo  $category['description'] ; ?></textarea>
         </div>
        </div>
    </div>
    <input type="submit" class="btn btn-success" value="<?php echo trans('admin.save'); ?>" />
  </form>
</main>
<?php
view('admin.layouts.footer');
?>
