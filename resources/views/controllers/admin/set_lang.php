<?php 
 if(in_array(request('lang'),["ar","en"])){
    set_locale(request("lang"));
 }

 back();
