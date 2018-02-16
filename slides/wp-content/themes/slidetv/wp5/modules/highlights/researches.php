<?php
class Researches{
    
    public function Researches(){
       
        $this->createCustomPostType();
        
    }
    
    public function getAllResearches($options = array()){
        
        
        $args = array("post_type"=>"highlights","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }
    
    
    public function createCustomPostType(){
        
        register_post_type('researches', array(	
            'label' => 'Pesquisas e Extensão',
            'description' => 'Pesquisas e Extensão',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => ''),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-highlights.png',
            'labels' => array (
                'name' => 'Pesquisas e Extensão',
                'singular_name' => 'Pesquisas e Extensão',
                'menu_name' => 'Pesquisas e Extensão',
                'add_new' => 'Novo Pesquisas e Extensão',
                'add_new_item' => 'Novo Pesquisas e Extensão',
                'edit' => 'Editar',
                'edit_item' => 'Editar Pesquisas e Extensão',
                'new_item' => 'Novo Pesquisas e Extensão',
                'view' => 'Ver Pesquisas e Extensão',
                'view_item' => 'Ver Pesquisas e Extensão',
                'search_items' => 'Buscar Pesquisas e Extensão',
                'not_found' => 'No Pesquisas e Extensão Found',
                'not_found_in_trash' => 'No Pesquisas e Extensão Found in Trash',
                'parent' => 'Parent Pesquisas e Extensão',
            ),
        ));
        
        add_filter('manage_edit-researches_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_researches_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
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
        add_meta_box("researchesCustomFields","Dados Pesquisa e Extensão",array(&$this,"formCustomFields"),"researches","normal","low");
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $link_research = (isset($data["link_research"])) ? $data["link_research"][0] : '';
        $edital_research = (isset($data["edital_research"])) ? $data["edital_research"][0] : '';
        $form_research = (isset($data["form_research"])) ? $data["form_research"][0] : '';
    
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        $current_user = wp_get_current_user();
        
        ?> 

        <p>
            <label for="linkResearch">Link Inscrição: </label>
            <input type="text" name="link_research" id="linkResearch" value="<?php echo $link_research; ?>" style="width:300px"/>
        </p>   
        <p>
            <label for="editalResarch">Arquivos de Edital: </label>
            <?php wp_editor($edital_research, "editalResearch", array("textarea_name" => "edital_research")); ?>
        </p>
        <p>
            <label for="editalResarch">Arquivos de Formulários: </label>
            <?php wp_editor($form_research, "formResearch", array("textarea_name" => "form_research")); ?>
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
        if( isset( $_POST['link_research'] ) )  
            update_post_meta( $postId, 'link_research',$_POST['link_research']);  

        if( isset( $_POST['edital_research'] ) )  
            update_post_meta( $postId, 'edital_research', $_POST['edital_research']);
        
        if( isset( $_POST['form_research'] ) )  
            update_post_meta( $postId, 'form_research', $_POST['form_research']);
    
    }
    
}

?>
