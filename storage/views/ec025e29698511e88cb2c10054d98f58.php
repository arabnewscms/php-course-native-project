<?php 
$data =  validation([
    'news_id'=>'required|integer|exists:news,id',
    'name'=>'required|string',
    'email'=>'required|email',
    'comment'=>'required|string',
    'status'=>'required|in:show,hide',
], [
    'name'=>trans('main.name'),
    'email'=>trans('main.email'),
    'comment'=>trans('main.comment'),
    'news_id'=>trans('main.news_id'),
    'status'=>trans('main.status'),
]);
  

$comment = db_find('comments', request('id'));
redirect_if(empty($comment),aurl('comments'));
 
 

db_update('comments',$data,request('id'));
session('success',trans('admin.updated'));
redirect(aurl('comments/edit?id='.request('id')));