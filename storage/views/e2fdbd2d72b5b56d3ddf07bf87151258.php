<?php
view('admin.layouts.header',['title'=>trans('admin.categories')]);

$catgories = db_paginate("categories", "",10);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h2>  <?php echo  trans('admin.categories') ; ?></h2>
<a class="btn btn-primary" href="<?php echo  aurl('categories/create') ; ?>"><?php echo  trans('admin.create') ; ?></a>      
</div>
<div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"><?php echo  trans('cat.name') ; ?></th>
              <th scope="col"><?php echo  trans('cat.icon') ; ?></th>
              <th scope="col"><?php echo  trans('cat.desc') ; ?></th>
              <th scope="col"><?php echo  trans('admin.action') ; ?></th>
            </tr>
          </thead>
          <tbody>
            <?php while($category = mysqli_fetch_assoc($catgories['query'])): ?>
            <tr>
              <td><?php echo  $category['id'] ; ?></td>
              <td><?php echo  $category['name'] ; ?></td>
              <td>
                <img src="<?php echo  storage_url($category['icon']) ; ?>" style="width:25px;height:25px;" />
              </td>
              <td><?php echo  $category['description'] ; ?></td>
              <td>
               
                <a href="<?php echo  aurl('categories/show?id='.$category['id']) ; ?>"><i class="fa-regular fa-eye"></i></a>
                <a href="<?php echo  aurl('categories/edit?id='.$category['id']) ; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
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
