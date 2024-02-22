<?php
view('admin.layouts.header',['title'=>trans('admin.categories')]);

$catgories = db_paginate("categories", "",10);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>  {{ trans('admin.categories') }} - {{ trans('admin.create') }}</h2>
<a class="btn btn-info" href="{{ aurl('categories') }}">{{ trans('admin.categories') }}</a>      
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
$name = get_error('name');
$icon = get_error('icon');
$description = get_error('description');
end_errors();
 
@endphp  

  <form method="post" action="{{aurl('categories/create')}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="post" />
    <div class="row">
        <div class="col-md-6">
        <div class="form-group">
          <label for="name">{{trans('cat.name')}}</label>
          <input type="text" name="name" placeholder="{{trans('cat.name')}}"  class="form-control {{ !empty($name)?'is-invalid':'' }}" value="{{old('name')}}" />
         </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
          <label for="icon">{{trans('cat.icon')}}</label>
          <input type="file" name="icon" placeholder="{{trans('cat.icon')}}"  class="form-control {{ !empty($icon)?'is-invalid':'' }}"  />
         </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
          <label for="description">{{trans('cat.desc')}}</label>
          <textarea name="description" placeholder="{{trans('cat.desc')}}"  class="form-control {{ !empty($description)?'is-invalid':'' }}"></textarea>
         </div>
        </div>
    </div>
    <input type="submit" class="btn btn-success" value="{{trans('admin.create')}}" />
  </form>
</main>
<?php
view('admin.layouts.footer');
?>
