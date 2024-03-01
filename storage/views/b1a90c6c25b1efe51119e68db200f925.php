<?php
view('admin.layouts.header', ['title'=>trans('admin.categories').'-'.trans('admin.edit')]);


$category = db_find('categories', request('id'));

redirect_if(empty($category), aurl('categories'));

?>
 
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> <?php echo  trans('admin.categories') ; ?> - <?php echo  trans('admin.edit') ; ?></h2>
		<a class="btn btn-info" href="<?php echo  aurl('categories') ; ?>"><?php echo  trans('admin.categories') ; ?></a>
	</div>
 

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
					<input type="text" name="name" placeholder="<?php echo trans('cat.name'); ?>"
						class="form-control <?php echo  !empty(get_error('name'))?'is-invalid':'' ; ?>" value="<?php echo  $category['name'] ; ?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="icon"><?php echo trans('cat.icon'); ?></label>
					<input type="file" name="icon" placeholder="<?php echo trans('cat.icon'); ?>"
						class="form-control <?php echo  !empty(get_error('icon'))?'is-invalid':'' ; ?>" />

					<?php echo  image(storage_url($category['icon'])) ; ?>


				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label for="description"><?php echo trans('cat.desc'); ?></label>
					<textarea name="description" placeholder="<?php echo trans('cat.desc'); ?>"
						class="form-control <?php echo  !empty(get_error('description'))?'is-invalid':'' ; ?>"><?php echo  $category['description'] ; ?></textarea>
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-success" value="<?php echo trans('admin.save'); ?>" />
	</form>
 
<?php
view('admin.layouts.footer');
?>