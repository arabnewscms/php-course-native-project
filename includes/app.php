<?php
ob_start();
$helpers = ["bcrypt","request","routing","helper","AES","db","session","auth","mail","translation","validation","storage","view"];

foreach($helpers as $helper){
    require __DIR__."/helpers/".$helper.".php";
}

/**
 * session save path 
 * with set ini and start session
 */
session_save_path(config('session.session_save_path'));
ini_set('session.gc_probability', 1);
session_start([
    'cookie_lifetime'=>config('session.expiration_timeout')
]);

$connect = mysqli_connect(
    config('database.servername'),
    config('database.username'),
    config('database.password'),
    config('database.database'),
    config('database.port'),
);
 

if(!$connect) {
    die("connection failed ".mysqli_connect_error());
}





require_once base_path('/routes/web.php');
require_once base_path('/includes/exception_error.php');
 


 


