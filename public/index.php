<?php
require_once __DIR__."/../includes/app.php";


// db_create('users',[]);
// db_update('users',[],5);
// db_delete('users', 5)
// db_find('users', 4)
// db_first('users', "where  email LIKE '%php42@php.net%'")
// db_get('users', " where email LIKE '%php0%' ");
// db_paginate("users", "",1);

// Set Data
// session('test', 'New Test Value');
// Get Session
// session('test');
// Destroy session By key
// session_forget('test');
// Destroy All Session
// session_delete_all();

// Send Mail Message
//send_mail(['php@mail.com'], 'test email', '<h1>Welcome to Our Project</h1>');

//set_locale('ar');
//trans('main.add_user');

// file managment in storage folder
// symlink(base_path('storage/files'), public_path('storage'));
// delete_file('storage/images/img.png'); // delete file
// storage('storage/images/img.png') // show or download file
// store_file(from,to)
// remove_folder('storage/images'); remove folder or directory

//https://github.com/arabnewscms/php-course-native-project
//https://getbootstrap.com/docs/5.3/examples/
route_init();
if(!empty($GLOBALS['query'])) {
    mysqli_free_result($GLOBALS['query']);
}

mysqli_close($connect);
//ob_end_clean();
ob_end_flush();
