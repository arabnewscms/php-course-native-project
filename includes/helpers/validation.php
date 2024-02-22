<?php



if(!function_exists('validation')) {
    function validation(array $attributes, array $trans=null,$http_header='redirect',$back=null)
    {
        $validations = [];
        $values = [];
        // start loop to extract attributes
        foreach($attributes as $attribute=>$rules) {
            $value = request($attribute);
            
            $values[$attribute] = $value;
            $attribute_validte = [];
            $final_attr = isset($trans[$attribute])?$trans[$attribute]:$attribute;
            foreach(explode('|', $rules) as $rule) {
                if($rule == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $attribute_validte[] = str_replace(':attribute', $final_attr, trans('validation.email'));
                } elseif($rule == 'required' && (is_null($value) || empty($value) || (isset($value['tmp_name']) && empty($value['tmp_name'])))) {
                    $attribute_validte[] = str_replace(':attribute', $final_attr, trans('validation.required'));
                } elseif($rule == 'integer' && !filter_var((int) $value, FILTER_VALIDATE_INT)) {
                    $attribute_validte[] = str_replace(':attribute', $final_attr, trans('validation.integer'));
                } elseif($rule == 'string' &&  !is_string($value)) {
                    $attribute_validte[] = str_replace(':attribute', $final_attr, trans('validation.string'));
                }elseif($rule == 'numeric' && !is_numeric($value)){
                    $attribute_validte[] = str_replace(':attribute', $final_attr, trans('validation.numeric'));
                }elseif($rule == 'image' && getimagesize($value['tmp_name']) === false){
                    $attribute_validte[] = str_replace(':attribute', $final_attr, trans('validation.image'));
                }
            }
           
            // bind attributes
            if(!empty($attribute_validte) && is_array($attribute_validte) && count($attribute_validte) > 0) {
                $validations[$attribute] = $attribute_validte;
            }
          
        }
      

    

        if(count($validations) > 0){
            if($http_header == 'redirect'){
                // End loop to extract attributes
                session('old', json_encode($values));
                session('errors', json_encode($validations));
                if(!is_null($back)){
                    redirect($back);
                }else{
                    back();
                }
            }elseif($http_header == 'api'){
                return json_encode($validations,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            }
         }else{
            return $values;
         }
    }
}

if(!function_exists('any_errors')) {
    function any_errors($offset=null)
    {
        $array = json_decode(session('errors'), true);
        if(isset($array[$offset]) && !is_null($offset)) {
            $text = $array[$offset];
            return is_array($text)?$text:[];
        } elseif(!empty($array) && count($array) > 0) {
            return $array;
        } else {
            return [];
        }
    }
}


if(!function_exists('all_errors')) {
    function all_errors()
    {
        $all_errors = [];
        foreach(any_errors() as $errors) {
            foreach($errors as $error) {
                $all_errors[] = $error;
            }
        }
        return $all_errors;
    }
}


if(!function_exists('get_error')) {
    function get_error($offset)
    {
        $error = '<ul>';
        foreach(any_errors($offset) as $error_string) {
            if(is_string($error_string)) {
                $error .='<li>'.$error_string.'</li>';
            }
        }
        $error .= '<ul>';
        return !empty(any_errors($offset))?$error:null;
    }
}

if(!function_exists('end_errors')) {
 function end_errors(){
    session_flash('errors'); 
 }
}

if(!function_exists('old')) {
    function old($request){
        $old_values = json_decode(session('old'), true);
        if(is_array($old_values) && !empty($old_values) && in_array($request,array_keys($old_values))){
            return $old_values[$request];
        }else{
            return '';
        }
    }
}
