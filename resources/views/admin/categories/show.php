<?php
view('admin.layouts.header',['title'=>trans('admin.categories').'-'.trans('admin.show')]);

 
$category = db_find('categories', request('id'));

redirect_if(empty($category),aurl('categories'));

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>  {{ trans('admin.categories') }} - {{ trans('admin.show') }} #{{ $category['name'] }}</h2>
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
          {{ $category['description'] }}
         </div>
        </div>
    </div>
 
</main>
<?php
view('admin.layouts.footer');
?>
