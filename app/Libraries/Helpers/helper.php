<?php

/**
 * Get the information whether the current section is backend, admin or public
 * @return array
 */
if (!function_exists('current_section')) {
    function current_section()
    {
        if (Request::is('backend*') || Request::is('admin*')) {
            $link_type = 'backend';
            $theme = !is_null(env('THEME_BACKEND')) ? env('THEME_BACKEND') : 'default';
        } else {
            $link_type = 'frontend';
            $theme = !is_null(env('THEME_FRONTEND')) ? env('THEME_FRONTEND') : 'default';
        }
        return array($link_type, $theme);
    }
}
/**
 * Current User
 * @return object
 */
if (!function_exists('current_user')) {
    function current_user()
    {
        if (Auth::check()) {
            return Auth::user();
        }
        return NULL;
    }
}

/**
 * Convert state
 * @param int
 * @return string
 */
if( !function_exists('sate_convert')) {
    function sate_convert($state) {
        switch($state) {
            case 1:
                return "Publish"; break;
            default :
                return "UnPublish"; break;
        }
    }
}

/**
 * Get current template path
 * @return string
 */
if (!function_exists('get_template_directory')) {
    function get_template_directory() {
        list($type, $theme) = current_section();
        return asset('templates/'.$type.'/'.$theme);
    }
}

if( !function_exists('format_time')) {
    /**
     * Convert int to time
     * @param $t
     * @param string $f
     * @return string
     */
    function format_time($t) // t = seconds, f = separator
    {
        $time_string = "";
        if(floor($t/3600) > 0) {
            $time_string .= floor($t/3600) . ' hours ';
        }
        if(($t/60)%60 > 0){
            $time_string .= ($t/60)%60 . ' minutes ';
        }
        if( $t%60 >= 0) {
            $time_string .= $t%60 . 's';
        }
        return $time_string;
    }
}