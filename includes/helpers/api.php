<?php
if(!function_exists('response')) {
    function response(array|null $data, int $status = 200)
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($status);
        if(!empty($data)) {
            return json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        }
    }
}
