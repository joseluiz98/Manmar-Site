<?php
class Videos{
    
    public function Videos(){
        
        $this->createCustomPostType();
        
    }
    
    public function getAllVideos($options = array()){
        
        $args = array("post_type"=>"videos","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }
    
    public function getThumbnail($linkVideo){
        
        $videoId = reset(explode("&",end(explode("?v=",$linkVideo))));
        
        return "http://i2.ytimg.com/vi/".$videoId."/default.jpg";
        
    }
    
    public function createCustomPostType(){
        
        register_post_type('videos', array(	
            'label' => 'Vídeos',
            'description' => 'Cadastro de Vídeos',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => ''),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','excerpt'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-videos.png',
            'labels' => array (
                'name' => 'Vídeos',
                'singular_name' => 'Vídeo',
                'menu_name' => 'Vídeos',
                'add_new' => 'Novo Vídeo',
                'add_new_item' => 'Novo Vídeo',
                'edit' => 'Editar',
                'edit_item' => 'Editar Vídeo',
                'new_item' => 'Novo Vídeo',
                'view' => 'Ver Vídeo',
                'view_item' => 'Ver Vídeo',
                'search_items' => 'Buscar Vídeos',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Vídeo',
            ),
        ));
        
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
    }
    
    public function addCustomFields(){
        
        add_meta_box("eventsCustomFields","Dados do Vídeos",array(&$this,"formCustomFields"),"videos","normal","low");
        
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $link_youtube = (isset($data["link_youtube"])) ? $data["link_youtube"][0] : '';
    
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        ?>    
        
        <p>
            <label for="dateEvent">Link Youtube: </label>
            <input type="text" name="link_youtube" id="linkYoutube" style="width:400px" value="<?php echo $link_youtube;?>" />
        </p>
    <?php
    
    }
    
    public function saveCustomFields($postId){
        
        // Verificando se é um AUTOSAVE
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 

        // if our nonce isn't there, or we can't verify it, bail 
        if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 

        //verificando se o usuário pode editar o post
        if( !current_user_can( 'edit_post' ) ) return; 


        // Salvando dados do formulário
        if( isset( $_POST['link_youtube'] ) )  
            update_post_meta( $postId, 'link_youtube',$_POST['link_youtube']);  
    
    }
    
}
?>
