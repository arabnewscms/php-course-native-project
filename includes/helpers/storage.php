<?php

if(!function_exists('storage')) {
    function storage($path)
    {
        if(file_exists($path)) {
            header('Content-Description: file from server');
            header('Content-Type: attachment; filename='.basename($path));
            header('Expiers: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public'); // private
            header('Content-Length: '.filesize($path));
            readfile($path);
        } 
         exit;
    }
}


if(!function_exists('delete_file')) {
    function delete_file($path)
        {
            if(file_exists($path)){
                return unlink($path);
            }
            return false;
        }
    }



if(!function_exists('remove_folder')) {
    function remove_folder($path)
        {
            if(is_dir($path)){
                return rmdir($path);
            }
            return false;
        }
    }


if(!function_exists('store_file')) {
    function store_file(array $from, string $to):bool
    {
        if(isset($from['tmp_name'])) {
            $to_path = '/'.ltrim($to, '/');
            $path = config('files.storage_files_path').$to_path;
            $ex_path = explode('/', $path);
            $end_file = end($ex_path);
            $check_path = str_replace($end_file, '', $path);
            if(!is_dir($check_path)) {
                mkdir($check_path, 0777, true);
            }
            move_uploaded_file($from['tmp_name'], $path);
            return true;
        }
        return false;
    }
}
