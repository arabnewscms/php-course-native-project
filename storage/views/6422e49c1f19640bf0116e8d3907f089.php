<?php
view('admin.layouts.header', ['title'=>trans('admin.news').'-'.trans('admin.edit')]);


$news = db_find('news', request('id'));
redirect_if(empty($news), aurl('news'));

$categories = db_get('categories', "");
?>
 
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> <?php echo  trans('admin.news') ; ?> - <?php echo  trans('admin.edit') ; ?></h2>
		<a class="btn btn-info" href="<?php echo  aurl('news') ; ?>"><?php echo  trans('admin.news') ; ?></a>
	</div>

	 
	 
	<form method="post" action="<?php echo aurl('news/edit?id='.$news['id']); ?>" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="post" />
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="title"><?php echo trans('news.title'); ?></label>
					<input type="text" id="title" name="title" placeholder="<?php echo trans('news.title'); ?>"
						class="form-control <?php echo  !empty(get_error('title'))?'is-invalid':'' ; ?>" value="<?php echo $news['title']; ?>" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="category_id"><?php echo trans('news.category_id'); ?></label>
					<select class="form-select <?php echo  !empty(get_error('category_id'))?'is-invalid':'' ; ?>" name="category_id">
						<option disabled selected><?php echo  trans('admin.choose') ; ?></option>
						<?php while($category  = mysqli_fetch_assoc($categories['query'])): ?>
						<option <?php echo  $news['category_id'] == $category['id']?'selected':'' ; ?> value="<?php echo  $category['id'] ; ?>"><?php echo  $category['name'] ; ?></option>
						<?php endwhile; ?>
					</select>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="image"><?php echo trans('news.image'); ?></label>
					<input type="file" id="image" name="image" placeholder="<?php echo trans('news.image'); ?>"
						class="form-control <?php echo  !empty(get_error('image'))?'is-invalid':'' ; ?>" />
						<?php echo  image(storage_url($news['image'])) ; ?>
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label for="description"><?php echo trans('news.description'); ?></label>
					<textarea name="description" placeholder="<?php echo trans('news.description'); ?>"
						class="form-control <?php echo  !empty(get_error('description'))?'is-invalid':'' ; ?>"><?php echo $news['description']; ?></textarea>
				</div>
			</div>


			<div class="col-md-12">
				<div class="form-group">
					<label for="content"><?php echo trans('news.content'); ?></label>
					<textarea name="content" id="content" placeholder="<?php echo trans('news.content'); ?>"
						class="form-control <?php echo  !empty(get_error('content'))?'is-invalid':'' ; ?>"><?php echo $news['content']; ?></textarea>
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-success" value="<?php echo trans('admin.save'); ?>" />
	</form>
 
<script>


	ClassicEditor
		.create(document.querySelector('#content'),{
			language: '<?php echo  session_has("locale")?session("locale"):"en" ; ?>',
		})
		.catch(error => {
			console.error(error);
		});
</script>
<?php
view('admin.layouts.footer');
?>