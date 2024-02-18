<?php 
    /**
     * request to get value from superglobal $_GET or $_POST
     * @param string|null $request
     * @return mixed
     */
if(!function_exists('request')){
    function request(string $request=null){
        if(isset($_FILES[$request]) && !empty($_FILES[$request])){
            return $_FILES[$request];
        }
        return isset($_REQUEST[$request])?$_REQUEST[$request]:null;
    }
}