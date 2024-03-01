<?php 
$user = db_find('users', request('id'));
redirect_if(empty($user),aurl('users'));
 
db_delete('users', request('id'));
session('success',trans('admin.deleted'));
redirect(aurl('users'));