<?php
class Stores{

    public function Stores(){
       
        $this->createCustomPostType();
    }
    
    public function getStores($options = array()){
        
        
        $args = array("post_type"=>"stores","orderby"=> "rand","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
    }

    public function getListStores($options = array()){
        
        $data = self::getStores($options);
        
        $stores = array();
        
        while($data->have_posts()){
            $data->the_post();
            $stores[get_the_ID()] = get_the_title(); 
        }
        
        wp_reset_postdata();
        
        return $stores;
    }
    
    public function getStoresByMeta($meta , $value , $limit = 100){
        
        global $wpdb;
        
        $data = $wpdb->get_results('SELECT post_id , meta_key , meta_value , Post.ID , Post.post_title , Post.post_date , Post.guid FROM sva_postmeta
                                    INNER JOIN sva_posts AS Post ON(Post.ID = post_id)
                                    WHERE meta_key = "'.$meta.'" AND meta_value = "'.$value.'"
                                    LIMIT '.$limit);
        return $data;       
    }
    
    public function createCustomPostType(){
        
        register_post_type('stores', array(	
            'label' => 'Lojas',
            'description' => 'Cadastro de Lojas',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'branches'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail','page-attributes'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-highlights.png',
            'labels' => array (
                'name' => 'Lojas',
                'singular_name' => 'Loja',
                'menu_name' => 'Lojas',
                'add_new' => 'Nova Loja',
                'add_new_item' => 'Nova Loja',
                'edit' => 'Editar',
                'edit_item' => 'Editar Loja',
                'new_item' => 'Nova Loja',
                'view' => 'Ver Loja',
                'view_item' => 'Ver Lojas',
                'search_items' => 'Buscar Lojas',
                'not_found' => 'No Lojas Found',
                'not_found_in_trash' => 'No Lojas Found in Trash',
                'parent' => 'Parent Loja',
            ),
        ));
        
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
    }
    
    public function addCustomFields(){

        add_meta_box("storesCustomFields","Dados da Loja",array(&$this,"formCustomFields"),"stores","normal","low");
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

        $location = (isset($data["location"])) ? $data["location"][0] : '';
        $workingDays = (isset($data["workingDays"])) ? $data["workingDays"][0] : '';
        $saturday = (isset($data["saturday"])) ? $data["saturday"][0] : '';
        $sunday = (isset($data["sunday"])) ? $data["sunday"][0] : '';
        $phone = (isset($data["phone"])) ? $data["phone"][0] : '';
        $email = (isset($data["email"])) ? $data["email"][0] : '';
        $hour = (isset($data["hour"])) ? $data["hour"][0] : '';
        ?>
        <h2 class="hndle ui-sortable-handle" style="padding: 12px 0;font-weight: 700;"><span>Horario de Funcionamento:</span></h2>
        <p>
            <br>
            <label for="hours">Dias Uteis: </label>
            <input type="text" name="workingDays" id="workingDays" style="width:400px" value="<?php echo $workingDays;?>" />
            <br>
            <br>
            <label for="hours">Sabado: </label>
            <input type="text" name="saturday" id="saturday" style="width:400px" value="<?php echo $saturday;?>" />
            <br>
            <br>
            <label for="hours">Domingo: </label>
            <input type="text" name="sunday" id="sunday" style="width:400px" value="<?php echo $sunday;?>" />
        </p>
        <p>
            <label for="location">Endereço: </label>
            <input type="text" name="location" id="location" style="width:400px" value="<?php echo $location;?>" />
        </p>
        <p>
            <label for="phone">Telefone: </label>
            <input type="text" name="phone" id="phone"style="width:400px" value="<?php echo $phone;?>" />
        </p>
        <p>
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email" style="width:400px" value="<?php echo $email;?>" />
        </p>
        <?php
    }
    
    public function saveCustomFields($postId){
        
        // Verificando se é um AUTOSAVE
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        // if our nonce isn't there, or we can't verify it, bail 
        if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce'))
            return;

        //verificando se o usuário pode editar o post
        if (!current_user_can('edit_post'))
            return;

        if( isset( $_POST['location'] ) )  
            update_post_meta($postId, 'location',$_POST['location']);

        if( isset( $_POST['workingDays'] ) )  
            update_post_meta($postId, 'workingDays',$_POST['workingDays']);    

        if( isset( $_POST['saturday'] ) )  
            update_post_meta($postId, 'saturday', $_POST['saturday']);

        if( isset( $_POST['sunday'] ) )  
            update_post_meta($postId, 'sunday', $_POST['sunday']);

        if( isset( $_POST['hour'] ) )  
            update_post_meta($postId, 'hour',$_POST['hour']);    

        if( isset( $_POST['phone'] ) )  
            update_post_meta($postId, 'phone', $_POST['phone']);

        if( isset( $_POST['email'] ) )  
            update_post_meta($postId, 'email', $_POST['email']);
    }
}
?>