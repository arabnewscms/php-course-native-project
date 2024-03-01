<?php
view('admin.layouts.header', ['title'=>trans('admin.categories').'-'.trans('admin.show')]);


$category = db_find('categories', request('id'));

redirect_if(empty($category), aurl('categories'));

?>
 
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> {{ trans('admin.categories') }} - {{ trans('admin.show') }} #{{ $category['name'] }}</h2>
		<a class="btn btn-info" href="{{ aurl('categories') }}">{{ trans('admin.categories') }}</a>
	</div>



	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">{{trans('cat.name')}}</label>
				{{ $category['name'] }}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="icon">{{trans('cat.icon')}}</label>

				{{ image(storage_url($category['icon'])) }}


			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label for="description">{{trans('cat.desc')}}</label>
				{{ $category['description'] }}
			</div>
		</div>
	</div>
 
<?php
view('admin.layouts.footer');
?>