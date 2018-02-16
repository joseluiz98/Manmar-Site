<?php
class Highlights{
    
    public function Highlights(){
       
        $this->createCustomPostType();
        
    }
    
    public function getAllHighlights($options = array()){
        
        
        $args = array("post_type"=>"highlights","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
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
        
        register_post_type('highlights', array(	
            'label' => 'Destaques',
            'description' => 'Cadastro de Destaques',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => ''),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail','page-attributes'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-highlights.png',
            'labels' => array (
                'name' => 'Destaques',
                'singular_name' => 'Destaque',
                'menu_name' => 'Destaques',
                'add_new' => 'Novo Destaque',
                'add_new_item' => 'Novo Destaque',
                'edit' => 'Editar',
                'edit_item' => 'Editar Destaque',
                'new_item' => 'Novo Destaque',
                'view' => 'Ver Destaque',
                'view_item' => 'Ver Destaque',
                'search_items' => 'Buscar Destaques',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Destaque',
            ),
        ));
        
        add_filter('manage_edit-highlights_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_highlights_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
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
        add_meta_box("highlightsCustomFields","Dados Destaque",array(&$this,"formCustomFields"),"highlights","normal","low");
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $link = (isset($data["link_highlight"])) ? $data["link_highlight"][0] : '';
        $date = (isset($data["date_highlight"])) ? $data["date_highlight"][0] : '';
        $type = (isset($data["type_highlight"])) ? $data["type_highlight"][0] : '';
        $unitId = (isset($data["unit_highlight"])) ? $data["unit_highlight"][0] : '';
    
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        $current_user = wp_get_current_user();
        
        $unit_args = array();
        $unit_profile = get_user_meta($current_user->data->ID,"unit_profile",true);
        if(isset($current_user->caps['marketing']) && ($current_user->caps['marketing'])){
            $unit_args["p"] = $unit_profile;
        }
        
        $units = Units::getListUnits($unit_args);
        
        ?>    
        <p>
            <label for="linkHighlight">Link: </label>
            <input type="text" name="link_highlight" id="linkHighlight" class="url" style="width:400px" value="<?php echo $link;?>" />
        </p>
        <p>
            <label for="dateHighlight">Data: </label>
            <input type="text" name="date_highlight" id="dateHighlight" class="date" value="<?php echo $date;?>" />
        </p>
        <p>
            <label for="typeHighlight">Tipo: </label>
            <select name="type_highlight" id="typeHighlight">
                <option value="1" <?php echo ($type==1) ? 'selected="selected"' : '';?>>Destaque Principal</option>
                <option value="2" <?php echo ($type==2) ? 'selected="selected"' : '';?>>Destaque Secundário</option>
            </select>    
        </p>
        <p>
            <label for="unitEvent">Unidade: </label>
            <select name="unit_highlight" id="unitEvent">
                <option value="all">Todos</option>
                <?php foreach($units as $key => $unit):?>
                <option value="<?php echo $key;?>" <?php echo ($unitId==$key) ? 'selected="selected"' : '';?>><?php echo $unit;?></option>
                <?php endforeach;?>
            </select>
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
        if( isset( $_POST['link_highlight'] ) )  
            update_post_meta( $postId, 'link_highlight',$_POST['link_highlight']);  

        if( isset( $_POST['date_highlight'] ) )  
            update_post_meta( $postId, 'date_highlight', $_POST['date_highlight']);

        if( isset( $_POST['type_highlight'] ) )  
            update_post_meta( $postId, 'type_highlight', $_POST['type_highlight']);
        
        if( isset( $_POST['unit_highlight'] ) )  
            update_post_meta( $postId, 'unit_highlight', $_POST['unit_highlight']);
    
    }
    
    
    
}

?>
