<?php

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
}

function debug($arr = array()) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function get_meta($field_name){

	return get_post_meta(get_the_ID(),$field_name,true);

}

?>
