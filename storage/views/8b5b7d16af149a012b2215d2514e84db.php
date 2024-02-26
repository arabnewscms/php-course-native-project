<?php 
$category = db_find('news', request('id'));
redirect_if(empty($category),aurl('news'));

if(!empty($category['image'])){
    delete_file($category['image']);
}

db_delete('news', request('id'));
redirect(aurl('news'));