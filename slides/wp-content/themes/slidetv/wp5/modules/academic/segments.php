<?php
class Segments{
    
    public function getSegments($options = array()){
        
        $args = array("post_type"=>"segments","orderby"=>"post_title","order"=>"ASC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
    }
    
    public function getListSegments($options = array()){
        
        $data = self::getSegments($options);
        
        $segments = array();
        
        while($data->have_posts()){
            $data->the_post();
            $segments[get_the_ID()] = get_the_title(); 
        }
        
        wp_reset_postdata();
        
        return $segments;
        
    }
    
    public function getSegmentById($unit_id){
        
        $args = array("p"=>$unit_id);
        
        return new WP_Query($args);
    }
    
    public function createCustomPostType(){
        
        register_post_type('segments', array(	
            'label' => 'Segmentos',
            'description' => 'Cadastro de Segmentos',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => ''),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-areas.png',
            'labels' => array (
                'name' => 'Segmentos',
                'singular_name' => 'Segmento',
                'menu_name' => 'Segmentos',
                'add_new' => 'Novo Segmento',
                'add_new_item' => 'Novo Segmento',
                'edit' => 'Editar',
                'edit_item' => 'Editar Segmento',
                'new_item' => 'Novo Segmento',
                'view' => 'Ver Segmento',
                'view_item' => 'Ver Segmento',
                'search_items' => 'Buscar Segmentos',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Segmento',
            ),
        ));
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
        
    }
    
    public function addCustomFields(){
        
        //add_meta_box("areaCustomFields","Dados de Segmentos",array(&$this,"formCustomFields"),"segments","normal","low");
    
    }
    
    public function saveCustomFields($postId){
        
        if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

        if(!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'],'my_meta_box_nonce')) return; 

        if(!current_user_can('edit_post')) return;
        
        if(isset($_POST['info_area']))
            update_post_meta( $postId,'info_area',$_POST['info_area']); 
       
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $info_area = (isset($data["info_area"])) ? $data["info_area"][0] : '';
    
        wp_nonce_field('my_meta_box_nonce','meta_box_nonce');
        
        ?>
        <p>
            <label for="infoArea">Mais Informações:</label>
            <?php wp_editor($info_area,"infoArea",array("textarea_name"=>"info_area"));?>
        </p>
        <?php
    }
    
}
?>