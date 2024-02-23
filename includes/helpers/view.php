<?php

if(!function_exists('view')) {
    function view(string $path, array $vars=null)
    {
        $file = config('view.path').'/'.str_replace('.', '/', $path).'.php';
      
        if(file_exists($file)) {
            
           $view =  $file;
        } else {
           $view =  config('view.path').'/404.php';
        }

        view_engine($view,$vars);
    }
}

if(!function_exists('view_engine')) {
    function view_engine(string $view,array $vars=null){
        
        if(!is_null($vars) && is_array($vars)) {
            foreach($vars as $key=>$value) {
                ${$key} =  $value;
            }
        }
 
        $file_hash_name  = md5($view);
        $save_to_storage = base_path('storage/views/'.$file_hash_name.'.php');
        //if(!file_exists($save_to_storage)){

            $file = file_get_contents($view);
            $file = str_replace('{{', '<?php echo ', $file);
            $file = str_replace('}}', '; ?>', $file);
            $file = str_replace('@php', '<?php ', $file);
            $file = str_replace('@endphp', ' ?>', $file);
            // if Statement
            $file = preg_replace('/@if\((.*?)\)+/i','<?php if($1)): ?>',$file); 
            $file = preg_replace('/@elseif\((.*?)\)+/i','<?php elseif($1)): ?>',$file); 
            $file = preg_replace('/@else/i','<?php else: ?>',$file); 
            $file = preg_replace('/@endif/i','<?php endif; ?>',$file); 
                // Foreach
            $file = preg_replace('/@foreach\((.*?) as (.*?)\)+/i','<?php foreach($1 as $2): ?>',$file); 
            $file = preg_replace('/@endforeach/i','<?php endforeach; ?>',$file); 
                    
           file_put_contents($save_to_storage, $file);
       // }
        include $save_to_storage;
    }
}

 
