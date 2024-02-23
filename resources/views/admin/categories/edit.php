<?php
view('admin.layouts.header',['title'=>trans('admin.categories').'-'.trans('admin.edit')]);

 
$category = db_find('categories', request('id'));

redirect_if(empty($category),aurl('categories'));

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>  {{ trans('admin.categories') }} - {{ trans('admin.edit') }}</h2>
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

  <form method="post" action="{{aurl('categories/edit?id='.$category['id'] )}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="post" />
    <div class="row">
        <div class="col-md-6">
        <div class="form-group">
          <label for="name">{{trans('cat.name')}}</label>
          <input type="text" name="name" placeholder="{{trans('cat.name')}}"  class="form-control {{ !empty($name)?'is-invalid':'' }}" value="{{ $category['name'] }}" />
         </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
          <label for="icon">{{trans('cat.icon')}}</label>
          <input type="file" name="icon" placeholder="{{trans('cat.icon')}}"  class="form-control {{ !empty($icon)?'is-invalid':'' }}"  />

        
<!-- Button trigger modal -->
<img src="{{ storage_url($category['icon']) }}" data-bs-toggle="modal" data-bs-target="#showImage" style="width:25px;height:25px;cursor:pointer" />
 
 <!-- Modal -->
 <div class="modal fade" id="showImage" tabindex="-1" aria-labelledby="showImageLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-body">
       <img src="{{ storage_url($category['icon']) }}" style="width:100%;height:80%;" />
       </div>
     </div>
   </div>
 </div> 
 
        </div>
        </div>

        <div class="col-md-12">
        <div class="form-group">
          <label for="description">{{trans('cat.desc')}}</label>
          <textarea name="description" placeholder="{{trans('cat.desc')}}"  class="form-control {{ !empty($description)?'is-invalid':'' }}">{{ $category['description'] }}</textarea>
         </div>
        </div>
    </div>
    <input type="submit" class="btn btn-success" value="{{trans('admin.save')}}" />
  </form>
</main>
<?php
view('admin.layouts.footer');
?>
