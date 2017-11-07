<?php

@ini_set('upload_max_size' , '128M');
@ini_set('post_max_size', '128M');
@ini_set('max_execution_time', '300');

require_once('wp5/wp5.php');
new WP5();


require_once ('functions/select_tipo_proposta.php');
require_once ('functions/select_tipo_arquivo.php');
require_once ('functions/select_tipo_arquivo_download.php');


if (is_admin()) {
    require_once 'config_panel/config_panel.php';
    new ConfigPanel();
};



/*------------------------------------*\
	Theme Support
\*------------------------------------*/

function SearchFilter($query) {
  if ($query->is_search) {
    // Insert the specific post type you want to search
    $query->set('post_type', 'videos');
  }
  return $query;
}
 
// This filter will jump into the loop and arrange our results before they're returned
add_filter('pre_get_posts','SearchFilter');

//  function template_chooser($template){    
//     global $wp_query;   
//     $post_type = get_query_var('post_type');   
//     if( $wp_query->is_search && $post_type == 'videos' ) {
//         return locate_template('search_videos.php');  //  redirect to archive-search.php
//     }   
//     return $template;   
// }
// add_filter('template_include', 'template_chooser'); 



if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('item', 270, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('item');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

}

/*------------------------------------*\
	Functions
\*------------------------------------*/
// function searchfilter($query) {
//     if ($query->is_search && !is_admin() ) {
//         if(isset($_GET['post_type'])) {
//             $type = $_GET['post_type'];
//                 if($type == 'videos') {
//                     $query->set('post_type',array('videos'));
//                 }
//         }       
//     }
// return $query;
// }
// add_filter('pre_get_posts','searchfilter');

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

      $fbimage = "http://localhost:8080/sva/wp-content/themes/sva/screenshot.jpg";
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



function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Notícias';
    $submenu['edit.php'][5][0] = 'Notícias';
    $submenu['edit.php'][10][0] = 'Adicionar Notícia';
    $submenu['edit.php'][16][0] = 'Tags';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Notícias';
    $labels->singular_name = 'Notícia';
    $labels->add_new = 'Adicionar Notícia';
    $labels->add_new_item = 'Adicionar Notícia';
    $labels->edit_item = 'Editar Notícia';
    $labels->new_item = 'Notícia';
    $labels->view_item = 'Ver Notícia';
    $labels->search_items = 'Buscar Notícias';
    $labels->not_found = 'Nenhuma Notícia encontrada';
    $labels->not_found_in_trash = 'Nenhuma Notícia encontrada no Lixo';
    $labels->all_items = 'Todos Notícias';
    $labels->menu_name = 'Notícias';
    $labels->name_admin_bar = 'Notícias';
}
 
add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );


function remove_wp_version () {
 
    return '';
} 

 function limit_caracter($string, $word_limit) {

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


// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
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
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Threaded Comments
function enable_threaded_comments()
{
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
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether



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
  echo '© <a href="http://giulianomartins.com.br/">giulianomartins.com.br</a> - <i>Giuliano Martins</i>';
}

//logo admin
function custom_admin_logo() {
    echo '<style type="text/css">
            .login h1 a { 
                background-image: url('. get_bloginfo('template_directory') . '/dist/imgs/logo-admin.png) !important;
                background-size: 184px;
                width: 200px;
                height: 120px;
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
      'menu-default' => __( 'MenuDefault' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
//fim menu

if(function_exists("register_field_group")){
    register_field_group(array (
        'id' => 'acf_campos-auxiliares-about-us',
        'title' => 'Campos Auxiliares About Us',
        'fields' => array (
            array (
                'key' => 'field_59afe63540e84',
                'label' => 'Mission',
                'name' => 'mission',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_59b7bff64d6b6',
                'label' => 'Expertise',
                'name' => 'expertise',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59b7c0484d6b7',
                'label' => 'Numeral Expertise',
                'name' => 'numeral',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59afe763e0281',
                'label' => 'Topico 1',
                'name' => 'topico_1',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59b2695c947c7',
                'label' => 'Imagem Topico 1',
                'name' => 'imagem_topico_1',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_59afe970d070e',
                'label' => 'Topico 2',
                'name' => 'topico_2',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59b2697f947c8',
                'label' => 'Imagem Topico 2',
                'name' => 'imagem_topico_2',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_59afe99c2bbeb',
                'label' => 'Topico 3',
                'name' => 'topico_3',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59b26991947c9',
                'label' => 'Imagem Topico 3',
                'name' => 'imagem_topico_3',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_59afe9a72bbec',
                'label' => 'Topico 4',
                'name' => 'topico_4',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59b269a4947ca',
                'label' => 'Imagem Topico 4',
                'name' => 'imagem_topico_4',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_59afe9ae2bbed',
                'label' => 'Topico 5',
                'name' => 'topico_5',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59b269b0947cb',
                'label' => 'Imagem Topico 5',
                'name' => 'imagem_topico_5',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '6',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_campos-auxiliares-branches',
        'title' => 'Campos Auxiliares Branches',
        'fields' => array (
            array (
                'key' => 'field_59afec2c39ff0',
                'label' => 'Header Lojas',
                'name' => 'lojas',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59afed0a39ff1',
                'label' => 'BT Anspach',
                'name' => 'bt_anspach',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59afedb78ccaf',
                'label' => 'BT Parvis Saint-Gilles',
                'name' => 'bt_parvis_saint-gilles',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59afedd8549ee',
                'label' => 'BT Place Flagey',
                'name' => 'bt_place_flagey',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59afedf293097',
                'label' => 'BT Barriere Saint Gilles',
                'name' => 'bt_barriere_saint_gilles',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59afee087ff72',
                'label' => 'BT Antwerpen',
                'name' => 'bt_antwerpen',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59afee205534e',
                'label' => 'BT Midi',
                'name' => 'bt_midi',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59afee30b0437',
                'label' => 'BT Place Bara',
                'name' => 'bt_place_bara',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '12',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_campos-auxiliares-contact',
        'title' => 'Campos Auxiliares Contact',
        'fields' => array (
            array (
                'key' => 'field_59b2a0fe56976',
                'label' => 'Texto Chamada',
                'name' => 'texto_chamada',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59b29d7b5299c',
                'label' => 'Address',
                'name' => 'endereço',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array (
                'key' => 'field_59b29d9e25573',
                'label' => 'Call us',
                'name' => 'telefone_funcionamento',
                'type' => 'textarea',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'br',
            ),
            array (
                'key' => 'field_59b29db225574',
                'label' => 'Email us',
                'name' => 'e-mail',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array (
                'key' => 'field_59b29f7cda0d3',
                'label' => 'Texto Link',
                'name' => 'texto_link',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '16',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_campos-auxiliares-faq',
        'title' => 'Campos Auxiliares Faq',
        'fields' => array (
            array (
                'key' => 'field_59b90502f53ed',
                'label' => 'Faqs',
                'name' => 'faqs',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '14',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_campos-auxiliares-home',
        'title' => 'Campos Auxiliares Home',
        'fields' => array (
            array (
                'key' => 'field_59c14f2fdd306',
                'label' => 'Icone um',
                'name' => 'icone_one',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_59c14f69dd307',
                'label' => 'Icone Dois',
                'name' => 'icone_two',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_59c14f7ddd308',
                'label' => 'Icone Tres',
                'name' => 'icone_three',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_59c14fee7f08e',
                'label' => 'Call Center',
                'name' => 'call_center',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c14ffb7f08f',
                'label' => 'Whatsapp',
                'name' => 'whatsapp',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c150259e4ef',
                'label' => 'E-mail',
                'name' => 'e-mail',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c15040a0e1e',
                'label' => 'Endereco',
                'name' => 'endereco',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c15050a0e1f',
                'label' => 'Funcionamento',
                'name' => 'funcionamento',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c152ee85063',
                'label' => 'Chamada Um (EN)',
                'name' => 'eye_one',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c1530f85064',
                'label' => 'Chamada Dois (EN)',
                'name' => 'eye_two',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c1532085065',
                'label' => 'Chamada Tres (EN)',
                'name' => 'eye_three',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c156cfdef08',
                'label' => 'Slogan (EN)',
                'name' => 'slogan',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c24b282c456',
                'label' => 'Titulo Lojas (EN)',
                'name' => 'titulo_lojas',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c24b382c457',
                'label' => 'Titulo Blog (EN)',
                'name' => 'titulo_blog',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c254ce04e0b',
                'label' => 'Chamada Blog (EN)',
                'name' => 'chamada_blog',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c24b432c458',
                'label' => 'Titulo Depoimentos (EN)',
                'name' => 'titulo_depoimento',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c24b702c459',
                'label' => 'Texto Call to Action Newsletter (EN)',
                'name' => 'text_call_to_action_newsletter',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_59c255ff1648e',
                'label' => 'Texto Botao Newsletter (EN)',
                'name' => 'texto_botao_newsletter',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_campos-auxiliares-lojas',
        'title' => 'Campos Auxiliares Lojas',
        'fields' => array (
            array (
                'key' => 'field_59c13519397bb',
                'label' => 'Image',
                'name' => 'image',
                'type' => 'gallery',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'stores',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}

function cptui_register_my_cpts() {

    /**
     * Post Type: Equipes.
     */

    $labels = array(
        "name" => __( "Equipes", "" ),
        "singular_name" => __( "Equipe", "" ),
    );

    $args = array(
        "label" => __( "Equipes", "" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "teams", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail" ),
    );

    register_post_type( "teams", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_cpts_teams() {

    /**
     * Post Type: Equipes.
     */

    $labels = array(
        "name" => __( "Equipes", "" ),
        "singular_name" => __( "Equipe", "" ),
    );

    $args = array(
        "label" => __( "Equipes", "" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "teams", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail" ),
    );

    register_post_type( "teams", $args );
}
add_action( 'init', 'cptui_register_my_cpts_teams' );

?>