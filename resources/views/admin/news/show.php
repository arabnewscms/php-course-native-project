<?php
view('admin.layouts.header', ['title'=>trans('admin.news').'-'.trans('admin.show')]);


$news = db_find('news', request('id'));

redirect_if(empty($news), aurl('news'));

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> {{ trans('admin.news') }} - {{ trans('admin.show') }} #{{ $news['title'] }}</h2>
		<a class="btn btn-info" href="{{ aurl('news') }}">{{ trans('admin.news') }}</a>
	</div>



	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="title">{{trans('news.title')}}</label>
				{{ $news['title'] }}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label for="category_id">{{trans('news.category_id')}}</label>

				 {{ $news['category_id'] }}

			</div>
		</div>


		<div class="col-md-6">
			<div class="form-group">
				<label for="image">{{trans('news.image')}}</label>

				{{ image(storage_url($news['image'])) }}


			</div>
		</div>

		<div class="col-md-12">
			<div class="form-group">
				<label for="description">{{trans('news.description')}}</label>
				{{ $news['description'] }}
			</div>
		</div>


		<div class="col-md-12">
			<div class="form-group">
				<label for="content">{{trans('news.content')}}</label>
				{{ $news['content'] }}
			</div>
		</div>
	</div>

</main>
<?php
view('admin.layouts.footer');
?>