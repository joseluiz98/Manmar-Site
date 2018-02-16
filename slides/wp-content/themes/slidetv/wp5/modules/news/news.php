<?php
class News{
    
    public function News(){

        add_filter('manage_edit-posts_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
        
    }
    
    public function manageCustomColumn($columns){
        
        unset($columns["date"]);
        unset($columns["tags"]);
        
        
        $columns["unit"] = "Unidade";
        $columns["date"] = "Data";
        
        return $columns;
        
    }
    
    public function manageCustomColumnContent($column,$post_id){
        
        if($column=="unit"){
            $unit_id = get_post_meta($post_id,"unit_news",true);
            if($unit_id!=""){
                echo get_the_title($unit_id);
            }else{
                echo "";
            }
        }
        
    }
    
    public function getAllNews($options = array()){
        
        
        $args = array("post_type"=>"post","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }
    
    public function addCustomFields(){
        add_meta_box("newsCustomFields","Dados Notícias",array(&$this,"formCustomFields"),"post","normal","low");
        
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $current_user = wp_get_current_user();
        
        $unit_args = array();
        $unit_profile = get_user_meta($current_user->data->ID,"unit_profile",true);
        if(isset($current_user->caps['marketing']) && ($current_user->caps['marketing'])){
            $unit_args["p"] = $unit_profile;
        }
        
        $units = Units::getListUnits($unit_args);
        
        $unitId = (isset($data["unit_news"])) ? $data["unit_news"][0] : '';
    
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        ?>    
        <p>
            <label for="unitEvent">Unidade: </label>
            <select name="unit_news" id="unitEvent">
                <option value="">Selecione a Unidade</option>
        <?php foreach ($units as $key => $unit): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($unitId == $key) ? 'selected="selected"' : ''; ?>><?php echo $unit; ?></option>
        <?php endforeach; ?>
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

        
        if (isset($_POST['unit_news']))
            update_post_meta($postId, 'unit_news', $_POST['unit_news']); 
    
    }
    
    
    
}

?>
