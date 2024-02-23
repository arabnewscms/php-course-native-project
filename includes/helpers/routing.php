<?php

/**
 * The array to store route configurations.
 * @var array<string>
 */
$routes = [];

/**
 * Define a route for HTTP GET requests.
 *
 * @param string $segment The route segment.
 * @param string|null $view The view associated with the route.
 */
if (!function_exists('route_get')) {
    function route_get($segment, $view = null)
    {
        global $routes;

        $routes['GET'][] = [
            'view' => $view,
            'segment' => '/'.public_().'/' . ltrim($segment, '/'),
        ];
    }
}

/**
 * Define a route for HTTP POST requests.
 *
 * @param string $segment The route segment.
 * @param string|null $view The view associated with the route.
 */
if (!function_exists('route_post')) {
    function route_post($segment, $view = null)
    {
        global $routes;
        $routes['POST'][] = [
            'view' => $view,
            'segment' => '/'.public_().'/' . ltrim($segment, '/'),
        ];
    }
}

/**
 * Initialize and process defined routes.
 */
if (!function_exists('route_init')) {
    function route_init()
    {
        global $routes;

        $GET_ROUTES = isset($routes['GET']) ? $routes['GET'] : [];
        $POST_ROUTES = isset($routes['POST']) ? $routes['POST'] : [];
         
        if(!isset($_POST['_method'])) {
            foreach ($GET_ROUTES as $rget) {
                if (segment() == $rget['segment']) {
                    view($rget['view']);
                }
            }
        }
         

        if (isset($_POST) && isset($_POST['_method']) && count($_POST) > 0 && strtolower($_POST['_method']) == 'post') {
            foreach ($POST_ROUTES as $rpost) {
                if (segment() == $rpost['segment']) {
                    view($rpost['view']);
                }
            }
 
            if (!is_null(segment()) && !in_array(segment(), array_column($POST_ROUTES, 'segment'))) {
                view('404');
                exit();
            }
        }
    }
}

/**
 * Redirect to a specified path.
 *
 * @param string $path The path to redirect to.
 * @return void
 */
if (!function_exists('redirect')) {
    function redirect($path)
    {
        $check_path = parse_url($path);
        if(isset($check_path['scheme']) && isset($check_path['host'])) {
            header('Location: ' . $path);
        } else {
            header('Location: ' . url($path));
        }
        exit();
    }
}

/**
 * back to previous Page
 *
 * @param string $path The path to redirect to.
 * @return void
 */
if (!function_exists('back')) {
    function back()
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit();
    }
}

/**
 * Generate a URL for a given segment.
 *
 * @param string $segment The URL segment.
 * @return string The generated URL.
 */
if (!function_exists('url')) {
    function url($segment)
    {
        $url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'];
        return $url . '/'.public_().'/' . ltrim($segment, '/');
    }
}
/**
 * Generate a Admin URL for a given segment.
 *
 * @param string $segment The URL segment.
 * @return string The generated URL.
 */
if (!function_exists('aurl')) {
    function aurl($segment)
    {
        $url = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'];
        return $url . '/'.public_().'/'.ADMIN .'/'. ltrim($segment, '/');
    }
}

/**
 * Get the current URL segment.
 *
 * @return string The current URL segment.
 */
if (!function_exists('segment')) {
    function segment()
    {
        $segment = ltrim($_SERVER['REQUEST_URI'], '/');
        $removeQueryParam = explode('?', $segment)[0];
        return !empty($segment) ? '/' . $removeQueryParam : '/';
    }
}
