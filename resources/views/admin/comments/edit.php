<?php
view('admin.layouts.header', ['title'=>trans('admin.comments').'-'.trans('admin.edit')]);


//$comment = db_find('comments', request('id'));

$comment = db_first('comments',"
JOIN news on comments.news_id = news.id
 
where comments.id=".request('id'),"
 
news.title as title,
comments.id,
comments.name,
comments.email,
comments.status,
comments.comment,
comments.news_id
 ");


redirect_if(empty($comment), aurl('comments'));

?>
 
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> {{ trans('admin.comments') }} - {{ trans('admin.edit') }}</h2>
		<a class="btn btn-info" href="{{ aurl('comments') }}">{{ trans('admin.comments') }}</a>
	</div>
 

	@php
	$name = get_error('name');
	$icon = get_error('icon');
	$description = get_error('description');
	end_errors();

	@endphp

	<form method="post" action="{{aurl('comments/edit?id='.$comment['id'] )}}" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="post" />
		<input type="hidden" name="news_id" value="{{$comment['news_id']}}" />

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">{{trans('comment.name')}}</label>
					<input type="text" name="name" placeholder="{{trans('comment.name')}}"
						class="form-control {{ !empty(get_error('name'))?'is-invalid':'' }}" value="{{ $comment['name'] }}" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">{{trans('comment.email')}}</label>
					<input type="text" name="email" placeholder="{{trans('comment.email')}}"
						class="form-control {{ !empty(get_error('email'))?'is-invalid':'' }}" value="{{ $comment['email'] }}" />
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">{{trans('comment.news')}}</label>
					<a href="{{aurl('news/show?id='.$comment['news_id'])}}" target="_blank">{{$comment['title']}}</a> 
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="name">{{trans('comment.status')}}</label>
					<select name="status" class="form-select {{ !empty(get_error('status'))?'is-invalid':'' }}" >
						<option value="show" {{ $comment['status'] == 'show'?'selected':'' }}>{{trans('comment.show')}}</option>
						<option value="hide" {{ $comment['status'] == 'hide'?'selected':'' }}>{{trans('comment.hide')}}</option>
					</select>
					 
				</div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label for="description">{{trans('comment.comment')}}</label>
					<textarea name="comment" placeholder="{{trans('comment.comment')}}"
						class="form-control {{ !empty(get_error('comment'))?'is-invalid':'' }}">{{ $comment['comment'] }}</textarea>
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-success" value="{{trans('admin.save')}}" />
	</form>
 
<?php
view('admin.layouts.footer');
?>