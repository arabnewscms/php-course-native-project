<?php
view('admin.layouts.header', ['title'=>trans('admin.news').'-'.trans('admin.edit')]);


$news = db_find('news', request('id'));
redirect_if(empty($news), aurl('news'));

$categories = db_get('categories', "");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> {{ trans('admin.news') }} - {{ trans('admin.edit') }}</h2>
		<a class="btn btn-info" href="{{ aurl('news') }}">{{ trans('admin.news') }}</a>
	</div>

	@if(any_errors())
	<div class="alert alert-danger">
		<ol>
			@foreach(all_errors() as $error)
			<li><?php echo $error ?></li>
			@endforeach
		</ol>
	</div>
	@endif

	@php
	$title = get_error('title');
	$image = get_error('image');
	$description = get_error('description');
	$category_id = get_error('category_id');
	$content = get_error('content');
	end_errors();

	@endphp

	<form method="post" action="{{aurl('news/edit?id='.$news['id'])}}" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="post" />
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="title">{{trans('news.title')}}</label>
					<input type="text" id="title" name="title" placeholder="{{trans('news.title')}}"
						class="form-control {{ !empty($title)?'is-invalid':'' }}" value="{{$news['title']}}" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="category_id">{{trans('news.category_id')}}</label>
					<select class="form-select {{ !empty($category_id)?'is-invalid':'' }}" name="category_id">
						<option disabled selected>{{ trans('admin.choose') }}</option>
						<?php while($category  = mysqli_fetch_assoc($categories['query'])): ?>
						<option {{ $news['category_id'] == $category['id']?'selected':'' }} value="{{ $category['id'] }}">{{ $category['name'] }}</option>
						<?php endwhile; ?>
					</select>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="image">{{trans('news.image')}}</label>
					<input type="file" id="image" name="image" placeholder="{{trans('news.image')}}"
						class="form-control {{ !empty($image)?'is-invalid':'' }}" />
						{{ image(storage_url($news['image'])) }}
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label for="description">{{trans('news.description')}}</label>
					<textarea name="description" placeholder="{{trans('news.description')}}"
						class="form-control {{ !empty($description)?'is-invalid':'' }}">{{$news['description']}}</textarea>
				</div>
			</div>


			<div class="col-md-12">
				<div class="form-group">
					<label for="content">{{trans('news.content')}}</label>
					<textarea name="content" id="content" placeholder="{{trans('news.content')}}"
						class="form-control {{ !empty($content)?'is-invalid':'' }}">{{$news['content']}}</textarea>
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-success" value="{{trans('admin.save')}}" />
	</form>
</main>
<script>


	ClassicEditor
		.create(document.querySelector('#content'),{
			language: '{{ session_has("locale")?session("locale"):"en" }}',
		})
		.catch(error => {
			console.error(error);
		});
</script>
<?php
view('admin.layouts.footer');
?>