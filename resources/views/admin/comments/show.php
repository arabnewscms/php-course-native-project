<?php
view('admin.layouts.header', ['title'=>trans('admin.comments').'-'.trans('admin.show')]);


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

//$comment = db_find('comments', request('id'));

redirect_if(empty($comment), aurl('comments'));

?>
 
	<div
		class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2> {{ trans('admin.comments') }} - {{ trans('admin.show') }} #{{ $comment['name'] }}</h2>
		<a class="btn btn-info" href="{{ aurl('comments') }}">{{ trans('admin.comments') }}</a>
	</div>



	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">{{trans('comment.name')}}</label>
				{{ $comment['name'] }}
			</div>
		</div>
		 
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">{{trans('comment.email')}}</label>
				{{ $comment['email'] }}
			</div>
		</div>
		 
		 
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">{{trans('comment.news')}}</label>
				{{ $comment['title'] }}
			</div>
		</div>
		 
		 
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">{{trans('comment.status')}}</label>
				{{ trans('comment.'.$comment['status']) }}
			</div>
		</div>
		 

		<div class="col-md-12">
			<div class="form-group">
				<label for="comment">{{trans('comment.comment')}}</label>
				{{ $comment['comment'] }}
			</div>
		</div>
	</div>
 
<?php
view('admin.layouts.footer');
?>