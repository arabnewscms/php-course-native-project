<?php 

//var_dump(request('image'));
///Volumes/web/www/php/public/storage/images/img.png
// store_file(request('image'), 'images/img.png');


$data =  validation([
    'email'=>'required|email',
    'mobile'=>'required|numeric',
    'address'=>'required|string',
] ,[
    'email'=>trans('main.email'),
    'mobile'=>trans('main.mobile'),
    'address'=>trans('main.address'),
]);
  
var_dump($data);

session_flash('old');