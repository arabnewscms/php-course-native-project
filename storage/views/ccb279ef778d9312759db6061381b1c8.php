<?php 
$data =  validation([
    'name'=>'required|string',
    'email'=>'required|email|unique:users',
    'password'=>'required|string',
    'mobile'=>'required|unique:users',
    'user_type'=>'required|string|in:user,admin',
] ,[
    'name'=>trans('user.name'),
    'email'=>trans('user.email'),
    'password'=>trans('user.password'),
    'mobile'=>trans('user.mobile'),
    'user_type'=>trans('user.user_type'),
]);
  
$data['password'] = bcrypt($data['password']);

db_create('users',$data);
session_forget('old');

redirect(aurl('users'));