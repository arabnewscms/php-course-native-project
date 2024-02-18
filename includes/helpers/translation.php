<?php

/**
 * Translate a language key to its corresponding value.
 *
 * @param string|null $key The language key to translate.
 * @param string|null $default The default language to use if no session locale is set.
 * @return string The translated language value or the key itself if not found.
 */
if (!function_exists('trans')) {
    function trans(string $key = null, string $default = null): string
    {
        $trans = explode('.', $key);

        if (session_has('locale')) {
            $default = session('locale');
        } else {
            $default = !empty(config('lang.default')) ? config('lang.default') : config('lang.fallback');
        }

        $path = config('lang.path') . '/' . $default . '/' . $trans[0] . ".php";

        if (file_exists($path) && count($trans) > 0) {
            $result = include $path;
            return isset($result[$trans[1]]) ? $result[$trans[1]] : $key;
        }

        return '';
    }
}

/**
 * Set the current locale in the session.
 *
 * @param string|null $lang The language code to set as the locale.
 */
if (!function_exists('set_locale')) {
    function set_locale(string $lang = null)
    {
        session('locale', $lang);
    }
}
