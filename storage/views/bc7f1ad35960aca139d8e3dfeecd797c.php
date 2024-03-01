<?php 
$category = db_find('categories', request('id'));
redirect_if(empty($category),aurl('categories'));

if(!empty($category['icon'])){
    delete_file($category['icon']);
}

db_delete('categories', request('id'));
session('success',trans('admin.deleted'));
redirect(aurl('categories'));