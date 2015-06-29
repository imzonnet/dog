<?php
/**
 * Z Helper
 * @author John Nguyen
 * @version 1.0
 */
if (!function_exists('current_section')) {
    /**
     * Get the information whether the current section is backend, admin or public
     * @return array
     */
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

if (!function_exists('current_user')) {
    /**
     * Current User
     * @return object
     */
    function current_user()
    {
        if (Auth::check()) {
            return Auth::user();
        }
        return NULL;
    }
}

if( !function_exists('user_state')) {
    /**
     * Convert state
     * @param int
     * @return string
     */
    function user_state($state) {
        switch($state) {
            case 1:
                return "Activated"; break;
            case 0:
            default :
                return "Unactivated"; break;
        }
    }
}


if( !function_exists('state_convert')) {
    /**
     * State convert
     * @param int
     * @return string
     */
    function state_convert($state) {
        switch($state) {
            case 1:
                return "Publish"; break;
            case 0:
                return "UnPublish"; break;
            case -1:
            default :
                return "Draft"; break;
        }
    }
}

if (!function_exists('get_template_directory')) {
    /**
     * Get current template path
     * @return string
     */
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