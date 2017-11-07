<?php
@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '300' );

add_filter('show_admin_bar', '__return_false');


//add_action( 'admin_menu', 'my_plugin_menu' );


if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('item', 570, 285, true); // Custom Thumbnail Size call using the_post_thumbnail('item');
    add_image_size('photo', 1000, 667, true); // Custom Thumbnail Size call using the_post_thumbnail('photo');
    add_image_size('full', '', '' , true); // Custom Thumbnail Size call using the_post_thumbnail('photo');

    // add_image_size('thumb352x400', 352, 400, false);
    // add_image_size('thumb200x200', 200, 200, false);
    // add_image_size('thumb287x116', 287, 116,false);
    // add_image_size('thumb334x116', 334, 116, true);
    // add_image_size('thumb123x164', 123, 164, false);
    // add_image_size('thumb694x271', 694, 271, true);
    // add_image_size('thumb1052x150', 1052, 150, false);
    // add_image_size('thumb1052x300', 1052, 300, false);
    // add_image_size('thumb1058x149', 1058, 149, false);
    add_image_size('thumb360x220', 360, 220, false);
    // add_image_size('thumb695x375', 695, 375, false);
    // add_image_size('thumb334x95', 334, 95, false);



    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

}


if ( is_page() ) {
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
}

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'testimonials',
	  array(
		'labels' => array(
		  'name' => __( 'Testimonials' ),
		  'singular_name' => __( 'Testimonial' )
		),
		'public' => true,
		'has_archive' => true,
	  )
	);
}

add_action( 'init', 'create_post_type_faqs' );
function create_post_type_faqs() {
	register_post_type( 'faqs',
	  array(
		'labels' => array(
		  'name' => __( "FAQ's" ),
		  'singular_name' => __( 'FAQ' )
		),
		'public' => true,
		'has_archive' => true,
	  )
	);
}

// function my_plugin_menu() {
// 	add_options_page( 'My Plugin Options', 'Powered By', 'manage_options', 'poweredby-azoora', 'my_plugin_options' );
// }

// function my_plugin_options() {
// 	if ( !current_user_can( 'manage_options' ) )  {
// 		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
// 	}
// 	echo '<div class="wrap">';
// 	echo '<a href="//www.azoora.com" target="_blank"><img alt="Azoora Incorporated" style="max-width:220px;" src="//www.azoora.com/Assets/Images/Favicon.png" /></a><p>This site is powered by <a href="//www.azoora.com" target="_blank">Azoora Incorporated</a>.</p>';
// 	echo '</div>';
// }

register_sidebar(array(
	'name' => __( 'Sidebar', 'RightSidebar' ),
	'id' => 'right-sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

add_theme_support( 'menus' );

add_theme_support( 'post-thumbnails' );

add_action( 'init', 'register_my_menus' );

function register_my_menus(){
	register_nav_menus(
		array
		(
			'sidebar-menu' => __( 'Sidebar Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
			'footer-menu-send-money' => __( 'Send Money - Footer Menu' )
		)
	);
}

add_theme_support('post-thumbnails');

if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
}

add_action( 'init', 'my_add_shortcodes' );

function my_add_shortcodes() {

	add_shortcode( 'my-login-form', 'my_login_form_shortcode' );
}

function my_login_form_shortcode() {

	if ( is_user_logged_in() )
		return '<p>You are already logged in!</p>';

	return wp_login_form( array( 'echo' => true ) );
}

function language_selector_flags(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        foreach($languages as $l){
            if(!$l['active']) echo '<a href="'.$l['url'].'">';
            echo '<img class="LangFlag" src="'.$l['country_flag_url'].'" alt="'.$l['language_code'].'" />';
            if(!$l['active']) echo '</a>';
        }
    }
}

// Desativando notificações de atualizações do CORE
add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
add_filter('pre_option_update_core', create_function('$a', "return null;"));

// Desativando notificações de atualizações dos PLUGINS
add_action('admin_menu', create_function('$a', "remove_action( 'load-plugins.php', 'wp_update_plugins' );"));
add_action('admin_init', create_function('$a', "remove_action( 'admin_init', 'wp_update_plugins' );"), 2);
add_action('init', create_function('$a', "remove_action( 'init', 'wp_update_plugins' );"), 2);
add_filter('pre_option_update_plugins', create_function('$a', "return null;"));

// Removendo menu de atualização da Admin Bar
function removeMenuAdminBar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('updates');
}
add_action('wp_before_admin_bar_render', 'removeMenuAdminBar');

//footer wordpress
add_filter('admin_footer_text', 'bl_admin_footer');
function bl_admin_footer() {
  echo '© <a href="http://www.btmt.eu/"><i>BT Money Transfers</i></a>';
}
?>