<?php 

$data =  validation([
    'name'=>'required|string',
    'icon'=>'required',
    'description'=>'required',
] ,[
    'name'=>trans('cat.name'),
    'icon'=>trans('cat.icon'),
    'description'=>trans('cat.desc'),
]);
