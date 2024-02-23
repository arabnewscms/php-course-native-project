<?php
view('admin.layouts.header',['title'=>trans('admin.categories')]);

$catgories = db_paginate("categories", "",10);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>  {{ trans('admin.categories') }}</h2>
<a class="btn btn-primary" href="{{ aurl('categories/create') }}">{{ trans('admin.create') }}</a>      
</div>
<div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">{{ trans('cat.name') }}</th>
              <th scope="col">{{ trans('cat.icon') }}</th>
              <th scope="col">{{ trans('cat.desc') }}</th>
              <th scope="col">{{ trans('admin.action') }}</th>
            </tr>
          </thead>
          <tbody>
            <?php while($category = mysqli_fetch_assoc($catgories['query'])): ?>
            <tr>
              <td>{{ $category['id'] }}</td>
              <td>{{ $category['name'] }}</td>
              <td>
                <img src="{{ storage_url($category['icon']) }}" style="width:25px;height:25px;" />
              </td>
              <td>{{ $category['description'] }}</td>
              <td>
               
                <a href="{{ aurl('categories/show?id='.$category['id']) }}">{{trans('admin.show')}}</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
</div>
</main>
<?php
view('admin.layouts.footer');
?>
