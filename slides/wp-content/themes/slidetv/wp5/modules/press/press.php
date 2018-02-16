<?php
class Press{
    
    public function Press(){
       
        $this->createCustomPostType();
        
    }
    
    public function getAllPress($options = array()){
        
        
        //$args = array("post_type"=>"press","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);'meta_query' => array(array('key' => 'extension_file','value' => date("Y-m-d"),'compare' => '>=','type'=> 'date')));
        $args = array('post_type' => 'press','meta_key' => 'extension_file', 'order' => 'DESC','orderby' => 'meta_value', 'posts_per_page' =>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }
    
    
    public function createCustomPostType(){
        
         register_post_type('press', array( 
            'label' => 'Imprensa',
            'description' => 'Materiais de Imprensa',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'rewrite' => array("slug"=>"imprensa"),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-coordinators.png',
            'labels' => array (
                'name' => 'Materiais',
                'singular_name' => 'Material',
                'menu_name' => 'Material de Imprensa',
                'add_new' => 'Novo Material de Imprensa',
                'add_new_item' => 'Novo Material de Imprensa',
                'edit' => 'Editar Material de Imprensa',
                'edit_item' => 'Editar Material de Imprensa',
                'new_item' => 'Novo material de Imprensa',
                'view' => 'Ver Material de Imprensa',
                'view_item' => 'Ver Material de Imprensa',
                'search_items' => 'Buscar Material de Imprensa',
                'not_found' => 'No Serviço Found',
                'not_found_in_trash' => 'No Material de Imprensa Found in Trash',
                'parent' => 'Parent Material de Imprensa',
            ),
        ));
        
        //registra taxonomia
        register_taxonomy('File', array('press'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Tipo'),
                'singular_name' => __('Tipo'),
                'search_items' => __('Buscar'),
                'popular_items' => __('Mais usados'),
                'all_items' => __('Todos os Tipos'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Editar Tipo'),
                'update_item' => __('Atualizar'),
                'add_new_item' => __('Adicionar Tipo'),
                'new_item_name' => __('Novo Tipo')
            ),
            'singular_label' => 'Tipo',
            'all_items' => 'Todos Tipos',
            'query_var' => true,
            'rewrite' => array('slug' => 'material-imprensa'))
        );
        
        add_filter('manage_edit-promotions_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_promotions_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
    }
    
    public function manageCustomColumn($columns){
        
        unset($columns["date"]);
        
        $columns["unit"] = "Unidade";
        $columns["date"] = "Data";
        
        return $columns;
        
    }
    
    public function manageCustomColumnContent($column,$post_id){
        
        if($column=="unit"){
            $unit_id = get_post_meta($post_id,"unit_highlight",true);
            if($unit_id!=""){
                echo get_the_title($unit_id);
            }else{
                echo "";
            }
        }
        
    }
    
    public function addCustomFields(){
        add_meta_box("researchesCustomFields","Dados do Arquivo",array(&$this,"formCustomFields"),"press","normal","low");
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $size_file = (isset($data["size_file"])) ? $data["size_file"][0] : '';
        $extension_file = (isset($data["extension_file"])) ? $data["extension_file"][0] : '';
    
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        $current_user = wp_get_current_user();
        
        ?> 

        <p>
            <label for="size_file">Tamnho do Arquivo: </label>
            <input type="text" name="size_file" id="size_file" value="<?php echo $size_file; ?>" style="width:300px"/>
        </p>   
        <p>
            <label for="extension_file">Data do Acomtecimento: </label>
            <input type="date" name="extension_file" id="extension_file" value="<?php echo $extension_file; ?>" style="width:300px"/>
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
        if( isset( $_POST['size_file'] ) )  
            update_post_meta( $postId, 'size_file',$_POST['size_file']);  

        if( isset( $_POST['extension_file'] ) )  
            update_post_meta( $postId, 'extension_file', $_POST['extension_file']);
    
    }
    
}

?>
