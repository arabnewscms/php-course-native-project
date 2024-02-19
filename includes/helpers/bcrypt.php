<?php 

if(!function_exists('bcrypt')){
    function bcrypt(string $password):string{
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
if(!function_exists('hash_check')){
    function hash_check(string $password,string $hash):bool{
        return password_verify($password, $hash);
    }

}