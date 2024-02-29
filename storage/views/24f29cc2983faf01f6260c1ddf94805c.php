<?php 
$data =  validation([
    'name'=>'required|string',
    'email'=>'required|email|unique:users,email,'.request('id'),
    'password'=>'',
    'mobile'=>'required|unique:users,mobile,'.request('id'),
    'user_type'=>'required|string|in:user,admin',
] ,[
    'name'=>trans('user.name'),
    'email'=>trans('user.email'),
    'password'=>trans('user.password'),
    'mobile'=>trans('user.mobile'),
    'user_type'=>trans('user.user_type'),
]);
 
if(!empty($data['password'])){
    $data['password'] = bcrypt($data['password']);   
}else{
    unset($data['password']);
} 

db_update('users',$data,request('id'));
 
redirect(aurl('users/edit?id='.request('id')));