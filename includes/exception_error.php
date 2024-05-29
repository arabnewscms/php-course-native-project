<?php


/**
 *
 * Exception Handling URL Pages
 */
$GET_ROUTES = isset($routes['GET'])?$routes['GET']:[];
if(!isset($_POST['_method']) && !is_null(segment()) && !in_array(segment(), array_column($GET_ROUTES, 'segment'))) {
    http_response_code(404);
    view('404');
    exit();
}
