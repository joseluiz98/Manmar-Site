<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

require_once('wp5/wp5.php');
new WP5();

add_action( 'init', 'my_custom_init' );
function my_custom_init() {

    remove_post_type_support( 'page', 'editor' );
}

add_filter('the_content_feed', 'rss_post_thumbnail');
 
function rss_post_thumbnail($content) {
global $post;
if( has_post_thumbnail($post->ID) )
  $content = '<p>' . get_the_post_thumbnail($post->ID, 'medium') . '</p>' . $content;
return $content;
}


function add_tags_categories() {
    register_taxonomy_for_object_type('post_tag', 'videos');
}
add_action('init', 'add_tags_categories');

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width)){
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    add_theme_support('widgets');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('item', 270, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('item');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

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



function get_fbimage() {
    $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), '', '');

    if (has_post_thumbnail($post->ID)) {
      $fbimage = $src[0];
    } else {
      global $post, $posts;
      $fbimage = '';
      $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',$post->post_content, $matches);
      $fbimage = $matches [1] [0];

    }

    if(empty($fbimage)) {

      $fbimage = "http://localhost/bt-site/wp-content/themes/bt_theme/screenshot.jpg";
    }
  return $fbimage;
}
add_filter('language_attributes', 'add_og_xml_ns');
function add_og_xml_ns($content) {
return ' xmlns:og="http://ogp.me/ns#" ' . $content;
}

add_filter('language_attributes', 'add_fb_xml_ns');
function add_fb_xml_ns($content) {
return ' xmlns:fb="https://www.facebook.com/2008/fbml" ' . $content;
}



// function change_post_label() {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'Câmbios BT';
//     $submenu['edit.php'][5][0] = 'Câmbios BT';
//     $submenu['edit.php'][10][0] = 'Adicionar Câmbio';
//     $submenu['edit.php'][16][0] = 'Tags';
//     echo '';
// }
// function change_post_object() {
//     global $wp_post_types;
//     $labels = &$wp_post_types['post']->labels;
//     $labels->name = 'Câmbios BT';
//     $labels->singular_name = 'Câmbio';
//     $labels->add_new = 'Adicionar Câmbio';
//     $labels->add_new_item = 'Adicionar Câmbio';
//     $labels->edit_item = 'Editar Câmbio';
//     $labels->new_item = 'Câmbio';
//     $labels->view_item = 'Ver Câmbio';
//     $labels->search_items = 'Buscar Câmbios';
//     $labels->not_found = 'Nenhum Câmbio encontrado';
//     $labels->not_found_in_trash = 'Nenhum Câmbio encontrado no Lixo';
//     $labels->all_items = 'Todos Câmbios';
//     $labels->menu_name = 'Câmbios';
//     $labels->name_admin_bar = 'Câmbios';
// }
 
// add_action( 'admin_menu', 'change_post_label' );
// add_action( 'init', 'change_post_object' );


function remove_wp_version () {
 
    return '';
} 

 
function limit_caracter($string, $word_limit){

   $words = explode(' ', $string, ($word_limit + 1));

        if(count($words) > $word_limit):
            array_pop($words); array_push($words,""); 
        endif;

    return implode(' ', $words);

}

function limitarTexto($texto, $limite){
    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' '));
    return $texto;
}

function my_formatter($content) {
 $new_content = '';
 $pattern_full = '{(\[raw\].*?\[/raw\])}is';
 $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
 $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
 
 foreach ($pieces as $piece) {
 if (preg_match($pattern_contents, $piece, $matches)) {
 $new_content .= $matches[1];
 } else {
 $new_content .= wptexturize(wpautop($piece));
 }
 }
 
 return $new_content;
}
add_filter('the_content', 'my_formatter', 99);

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var){
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist){
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes){
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style(){
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Remove Admin bar
function remove_admin_bar(){
    return false;
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ){
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Threaded Comments
function enable_threaded_comments(){
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

/*------------------------------------*\
	Actions + Filters
\*------------------------------------*/

// Add Actions
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
//remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

remove_filter ( 'the_content', 'wpautop');
remove_filter ( 'the_excerpt', 'wpautop');

add_filter( 'the_content', 'remove_empty_p', 20, 1 );
function remove_empty_p( $content ){
    // clean up p tags around block elements
    $content = preg_replace( array(
        '#<p>\s*<(div|aside|section|article|header|footer)#',
        '#</(div|aside|section|article|header|footer)>\s*</p>#',
        '#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
        '#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
        '#<p>\s*</(div|aside|section|article|header|footer)#',
    ), array(
        '<$1',
        '</$1>',
        '</$1>',
        '<$1$2>',
        '</$1',
    ), $content );
    return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)*(\s|&nbsp;)*</p>#i', '', $content);
}


// -- FUNÇÕES -- //

/* ----------------------------------------------------- */
// Resumo com limite de palavras personalizado
/* ----------------------------------------------------- */
function the_excerpt_limit($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
        $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        echo $excerpt;
}

/* ----------------------------------------------------- */
// Retorna a url
/* ----------------------------------------------------- */
function getUriCurrent(){
	return 'http://'.$_SERVER['HTTP_HOST'];	
}

/* ----------------------------------------------------- */
/* Customizando a exibição dos campos personalizados*/
/* ----------------------------------------------------- */
add_action('admin_menu', 'remove_menus');
	function remove_menus () {
		if (current_user_can( 'edit_themes' )) {
			global $menu;
	
		$restricted = array(
		//Comente as linhas a seguir para exibir os itens.
		//__('Dashboard'),
		//__('Posts'),
		//__('Media'),
		//__('Links'),
		//__('Pages'),
		//__('Appearance'),
		//__('Tools'),
		//__('Users'),
		//__('Settings'),
		//__('Comments'),
		//__('Plugins')
		);
	
		end ($menu);
	
		while (prev($menu)) {
			$value = explode(' ',$menu[key($menu)][0]);
		
		if( in_array($value[0] != NULL?$value[0]:"" , $restricted) )
			unset($menu[key($menu)]);
		}
	}
	else {return false;}
}

function getImagesFromShortCode($shortcode){
    preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);
    $images_ids = explode(",", $ids[1]);
    $images = array();
    foreach($images_ids as $image_id) {
        $image =  wp_get_attachment_image_src($image_id,"large");
        array_push($images, $image);
    }
        
    return $images_ids;
}

/* ----------------------------------------------------- */
/* Custom */
/* ----------------------------------------------------- */

//add query varriables with custom template
function add_my_var($public_query_vars) {
    $public_query_vars[] = 'myvar';
    return $public_query_vars;
}

add_filter('query_vars', 'add_my_var');

function do_rewrite() {
    add_rewrite_rule('slug-da-pagina/([^/]+)/?$', 'index.php?pagename=slug-da-pagina&myvar=$matches[1]','top');
    add_rewrite_rule('slug-da-pagina/(.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=slug-da-pagina&myvar=$matches[1]&paged=$matches[2]','top');
    
}

add_action('init', 'do_rewrite');


//footer wordpress
add_filter('admin_footer_text', 'bl_admin_footer');
function bl_admin_footer() {
  echo '© <a href="http://www.btmt.eu/"><i>BT Money Transfers</i></a>';
}

//logo admin
function custom_admin_logo() {
    echo '<style type="text/css">
    		body{background:#e6e6e6;}
            .login h1 a { 
                background-image: url('. get_bloginfo('template_directory') . '/dist/imgs/screenshot.jpg) !important;
                background-size: 200px;
                width: 200px;
                height: 180px;
            }
         </style>';
}
add_action('login_head', 'custom_admin_logo');

//Link na tela de login para a página inicial 
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return 'Powered by Giuliano Martins';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//menu bootstrap
include 'wp_bootstrap_navwalker.php';

function register_my_menus() {
  register_nav_menus(
    array(
      'menu-top' => __( 'menu-top' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
//fim menu
?>