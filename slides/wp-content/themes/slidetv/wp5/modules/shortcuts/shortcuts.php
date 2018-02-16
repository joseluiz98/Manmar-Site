<?php
class Shortcuts{
    
    public function Shortcuts(){
       
        $this->createCustomPostType();
        
    }
    
    //criado por robson para listar os atalhos
    public function getShortcuts($options = array()){
        
        
        $args = array("post_type"=>"shortcuts","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        //debug($args);
        
        return new WP_Query($args);
        
    }
    
    public function getAllHighlights($options = array()){
        
        
        $args = array("post_type"=>"shortcuts","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        debug($args);
        
        return new WP_Query($args);
        
    }
    
    public function getHighlightsByMeta($meta , $value , $limit = 100){
        
        global $wpdb;
        
        $data = $wpdb->get_results('SELECT post_id , meta_key , meta_value , Post.ID , Post.post_title , Post.post_date , Post.guid FROM wp_postmeta
                                    INNER JOIN wp_posts AS Post ON(Post.ID = post_id)
                                    WHERE meta_key = "'.$meta.'" AND meta_value = "'.$value.'"
                                    LIMIT '.$limit);
        
        return $data;
        
    }
    
    
    
    public function createCustomPostType(){
        
        register_post_type('shortcuts', array(	
            'label' => 'Atalhos',
            'description' => 'Cadastro de Atalho',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => ''),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-highlights.png',
            'labels' => array (
                'name' => 'Atalhos',
                'singular_name' => 'Atalho',
                'menu_name' => 'Atalhos',
                'add_new' => 'Novo Atalho',
                'add_new_item' => 'Novo Atalho',
                'edit' => 'Editar',
                'edit_item' => 'Editar Atalho',
                'new_item' => 'Novo Atalho',
                'view' => 'Ver Atalho',
                'view_item' => 'Ver Atalhos',
                'search_items' => 'Buscar Atalhos',
                'not_found' => 'No Atalho Found',
                'not_found_in_trash' => 'No Atalho Found in Trash',
                'parent' => 'Parent Atalho',
            ),
        ));
        
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
    }
    
    public function addCustomFields(){
        add_meta_box("shortcutsCustomFields","Dados Atalho",array(&$this,"formCustomFields"),"shortcuts","normal","low");
        
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $link = (isset($data["link_shortcut"])) ? $data["link_shortcut"][0] : '';
        $textShortcut = (isset($data["text_shortcut"])) ? $data["text_shortcut"][0] : '';
    
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        
        ?>    
        <p>
            <label for="linkShortcut">Link: </label><br/>
            <input type="text" name="link_shortcut" id="linkShortcut" style="width:400px" value="<?php echo $link;?>" />
        </p>
        
        <p><!--//inserido por robson para texto do atalho -->
            <label>Texto complementar:</label><br/>
            <input type="text" name="text_shortcut" id="textShortcut" style="width: 600px;" value="<?php echo $textShortcut; ?>" />
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
        if( isset( $_POST['link_shortcut'] ) )  
            update_post_meta( $postId, 'link_shortcut',$_POST['link_shortcut']); 
        //inserido por robson para texto do atalho
        if(isset($_POST['text_shortcut'] ) )
            update_post_meta ($postId, 'text_shortcut', $_POST['text_shortcut']);
    
    }
    
    
    
}

?>
