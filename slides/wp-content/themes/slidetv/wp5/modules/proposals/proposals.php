<?php
class Proposals{

    public $areas = array(
        1 => 'Educação',
        2 => 'Saúde',
        3 => 'Segurança',
        4 => 'Transporte'
    );
    
    public function Proposals(){
       
        $this->createCustomPostType();
        
    }
    
    public function getAllProposals($options = array()){
        
        
        $args = array("post_type"=>"proposals","orderby"=>"title","order"=>"ASc","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }

    public function createCustomPostType(){
        
        register_post_type('proposals', array(   
            'label' => 'Propostas',
            'description' => 'Cadastro de Proposta',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'rewrite' => array("slug"=>"proposta"),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-events.png',
            'labels' => array (
                'name' => 'Propostas',
                'singular_name' => 'Proposta',
                'menu_name' => 'Propostas',
                'add_new' => 'Nova Proposta',
                'add_new_item' => 'Nova Proposta',
                'edit' => 'Editar',
                'edit_item' => 'Editar Proposta',
                'new_item' => 'Nova Proposta',
                'view' => 'Ver Proposta',
                'view_item' => 'Ver Proposta',
                'search_items' => 'Buscar Propostas',
                'not_found' => 'No Proposta Found',
                'not_found_in_trash' => 'No Proposta Found in Trash',
                'parent' => 'Parent Proposta',
            ),
        ));
        
        register_taxonomy('Area', array('proposals'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Área'),
                'singular_name' => __('Área'),
                'search_items' => __('Buscar'),
                'popular_items' => __('Mais usados'),
                'all_items' => __('Todos os Tipos'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Editar Área'),
                'update_item' => __('Atualizar'),
                'add_new_item' => __('Adicionar Área'),
                'new_item_name' => __('Novo Área')
            ),
            'singular_label' => 'Área',
            'all_items' => 'Todos Tipos',
            'query_var' => true,
            'rewrite' => array('slug' => 'area'))
        );

        flush_rewrite_rules();
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
    }
    
    public function addCustomFields(){
        add_meta_box("ServicesCustomFields","Dados da Proposta",array(&$this,"formCustomFields"),"proposals","normal","low");
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);

        $area_proposal = (isset($data["area_proposal"])) ? $data["area_proposal"][0] : '';
        $location = (isset($data["location"])) ? $data["location"][0] : '';
        $phone = (isset($data["phone"])) ? $data["phone"][0] : '';
        $email = (isset($data["email"])) ? $data["email"][0] : '';
        
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

        ?>
        <!-- <p>
            <label for="area_proposal">Área: </label>
            <select name="area_proposal" id="area_proposal">
                <?php foreach($this->areas as $key => $areas){?>
                <option value="<?php echo $key;?>" <?php echo ($area_proposal==$key)? 'selected="selected"' : '';?>><?php echo $areas;?></option>
                <?php }?>
            </select>
        </p>  -->
        <!-- <p>
            <label for="location">Localização no mall: </label>
            <input type="text" name="location" id="location" style="width:400px" value="<?php echo $location;?>" />
        </p>
        <p>
            <label for="phone">Telefone: </label>
            <input type="text" name="phone" id="phoneAdmin"style="width:400px" value="<?php echo $phone;?>" />
        </p>
        <p>
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email" style="width:400px" value="<?php echo $email;?>" />
        </p> -->
    <?php
    
    }
    
    public function saveCustomFields($postId){
        
        // Verificando se é um AUTOSAVE
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 

        // if our nonce isn't there, or we can't verify it, bail 
        // se o nosso nonce não está lá, ou não podemos confirmá-lo, socorrê - lo
        if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return; 

        //verificando se o usuário pode editar o post
        if( !current_user_can( 'edit_post' ) ) return; 


        // Salvando dados do formulário

        if( isset( $_POST['area_proposal'] ) ) 
            update_post_meta($postId, 'area_proposal', $_POST['area_proposal']);

        if( isset( $_POST['location'] ) )  
            update_post_meta($postId, 'location',$_POST['location']);  

        if( isset( $_POST['phone'] ) )  
            update_post_meta($postId, 'phone', $_POST['phone']);

        if( isset( $_POST['email'] ) )  
            update_post_meta($postId, 'email', $_POST['email']);
          
    }
       
}
?>