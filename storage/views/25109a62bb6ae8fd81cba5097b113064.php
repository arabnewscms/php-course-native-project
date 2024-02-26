<?php
view('admin.layouts.header', ['title'=>trans('admin.news').'-'.trans('admin.show')]);


$news = db_find('news', request('id'));

redirect_if(empty($news), aurl('news'));

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> <?php echo  trans('admin.news') ; ?> - <?php echo  trans('admin.show') ; ?> #<?php echo  $news['title'] ; ?></h2>
		<a class="btn btn-info" href="<?php echo  aurl('news') ; ?>"><?php echo  trans('admin.news') ; ?></a>
	</div>



	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="title"><?php echo trans('news.title'); ?></label>
				<?php echo  $news['title'] ; ?>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="category_id"><?php echo trans('news.category_id'); ?></label>

				 <?php echo  $news['category_id'] ; ?>

			</div>
		</div>


		<div class="col-md-6">
			<div class="form-group">
				<label for="image"><?php echo trans('news.image'); ?></label>

				<?php echo  image(storage_url($news['image'])) ; ?>


			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label for="description"><?php echo trans('news.description'); ?></label>
				<?php echo  $news['description'] ; ?>
			</div>
		</div>


		<div class="col-md-12">
			<div class="form-group">
				<label for="content"><?php echo trans('news.content'); ?></label>
				<?php echo  $news['content'] ; ?>
			</div>
		</div>
	</div>

</main>
<?php
view('admin.layouts.footer');
?>