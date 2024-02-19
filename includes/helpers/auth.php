<?php 

if(!function_exists('auth')){
    function auth(){
        if(session_has('admin')){
            return json_decode(session('admin'));
        }else{
            return null;
        }
    }
}

if(!function_exists('logout')){
    function logout(){
        session_forget('admin');
    }
}