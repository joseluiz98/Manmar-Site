<?php
class Contributors{
    
    public function Contributors(){
        
        $this->createCustomPostType();
        
    }
    
    public function getAllContributors($options = array()){
        
        $args = array("post_type"=>"contributors","orderby"=>"title","order"=>"ASC","posts_per_page"=>-1);
        
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
        
        register_post_type('contributors', array(   
            'label' => 'Colaboradores',
            'description' => 'Cadastro de Colaboradores',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => ''),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','thumbnail','editor'),
            //'taxonomies' => array('tag'), // this is IMPORTANT
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-coordinators.png',
            'labels' => array (
                'name' => 'Colaboradores',
                'singular_name' => 'Colaborador',
                'menu_name' => 'Colaboradores',
                'add_new' => 'Novo Colaborador',
                'add_new_item' => 'Novo Colaborador',
                'edit' => 'Editar',
                'edit_item' => 'Editar Colaborador',
                'new_item' => 'Novo Colaborador',
                'view' => 'Ver Colaborador',
                'view_item' => 'Ver Colaborador',
                'search_items' => 'Buscar Colaboradores',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Colaborador',
            ),
        ));
        

        // register_taxonomy('Key', array('contributors'), array(
        //     'hierarchical' => true,
        //     'labels' => array(
        //         'name' => __('Categoria'),
        //         'singular_name' => __('Categoria'),
        //         'search_items' => __('Buscar'),
        //         'popular_items' => __('Mais usados'),
        //         'all_items' => __('Todos os Tipos'),
        //         'parent_item' => null,
        //         'parent_item_colon' => null,
        //         'edit_item' => __('Editar Categoria'),
        //         'update_item' => __('Atualizar'),
        //         'add_new_item' => __('Adicionar Categoria'),
        //         'new_item_name' => __('Novo Categoria')
        //     ),
        //     'singular_label' => 'Categoria',
        //     'all_items' => 'Todos Tipos',
        //     'query_var' => true,
        //     'rewrite' => array('slug' => 'tipo'))
        // );
        
        flush_rewrite_rules();
        
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
    }

    
    public function addCustomFields(){
        
        //add_meta_box("eventsCustomFields","Dados do Colaborador",array(&$this,"formCustomFields"),"contributors","normal","low");
        
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $linkVideo = (isset($data["linkVideo"])) ? $data["linkVideo"][0] : '';
    
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        ?>    
        
        <!-- <p>
            <label for="dateEvent">Link Youtube: </label>
            <input type="text" name="linkVideo" id="linkYoutube" style="width:400px" value="<?php echo $linkVideo;?>" />
        </p> -->
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
        if( isset( $_POST['linkVideo'] ) )  
            update_post_meta( $postId, 'linkVideo',$_POST['linkVideo']);  
    
    }
    
}
?>
