<?php
class Levels{
    
    public function getLevels($options = array()){
        
        $args = array("post_type"=>"levels","orderby"=>"post_title","order"=>"ASC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
    }
    
    public function getListLevels($options = array()){
        
        $data = self::getlevels($options);
        
        $areas = array();
        
        while($data->have_posts()){
            $data->the_post();
            $areas[get_the_ID()] = get_the_title(); 
        }
        
        wp_reset_postdata();
        
        return $areas;
        
        
    }
    
    public function getLevelById($unit_id){
        
        $args = array("p"=>$unit_id);
        
        return new WP_Query($args);
        
        
    }
    
   
    public function createCustomPostType(){
        
        register_post_type('levels', array(	
            'label' => 'Moedas',
            'description' => 'Cadastro de Moeda',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'moedas'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-areas.png',
            'labels' => array (
                'name' => 'Moedas',
                'singular_name' => 'Moeda',
                'menu_name' => 'Moedas',
                'add_new' => 'Novo Moeda',
                'add_new_item' => 'Novo Moeda',
                'edit' => 'Editar',
                'edit_item' => 'Editar Moeda',
                'new_item' => 'Novo Moeda',
                'view' => 'Ver Moeda',
                'view_item' => 'Ver Moeda',
                'search_items' => 'Buscar Moedas',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Moeda',
            ),
        ));
        
        flush_rewrite_rules();
        
    }
    
}
?>