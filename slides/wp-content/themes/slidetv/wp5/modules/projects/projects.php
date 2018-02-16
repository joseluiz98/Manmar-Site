<?php
class Projects{
    
    public function Projects(){ 
       
        $this->createCustomPostType();
        
    }
    
    public function getAllProjects($options = array()){
        
        
        $args = array("post_type"=>"projects","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }
    
    
    public function createCustomPostType(){
        
        register_post_type('projects', array(	
            'label' => 'Projetos',
            'description' => 'Projetos',
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
                'name' => 'Projetos',
                'singular_name' => 'Projeto',
                'menu_name' => 'Projetos',
                'add_new' => 'Novo Projeto',
                'add_new_item' => 'Novo Projeto',
                'edit' => 'Editar',
                'edit_item' => 'Editar Projeto',
                'new_item' => 'Novo Projeto',
                'view' => 'Ver Projeto',
                'view_item' => 'Ver Projeto',
                'search_items' => 'Buscar Projetos',
                'not_found' => 'No Projetos Found',
                'not_found_in_trash' => 'No Projetos Found in Trash',
                'parent' => 'Parent Projeto',
            ),
        ));
        
        register_taxonomy('cat_projects', array('projects'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => __('Categoria Projeto'),
                'singular_name' => __('Categoria Projeto'),
                'search_items' => __('Buscar'),
                'popular_items' => __('Mais usados'),
                'all_items' => __('Todas as Categorias'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Editar Categoria'),
                'update_item' => __('Atualizar'),
                'add_new_item' => __('Adicionar Categoria'),
                'new_item_name' => __('Novo Categoria')
            ),
            'singular_label' => 'Categoria Projeto',
            'all_items' => 'Todas Categorias',
            'query_var' => true,
            'rewrite' => array('slug' => 'type'))
        );

        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
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
