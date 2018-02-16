<?php
class Services{

    public $status = array(
        1 => 'Vestibular Aberto',
        2 => 'gabaritos',
        3 => 'Resultado do Vestibular',
        4 => 'Vagas Remanescentes'
    );
    
    public function Services(){
       
        $this->createCustomPostType();
        
    }
    
    public function getAllServices($options = array()){
        
        
        $args = array("post_type"=>"services","orderby"=>"post_title","order"=>"ASC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }

    public function createCustomPostType(){
        
        register_post_type('services', array(	
            'label' => 'Partners',
            'description' => 'Cadastro de Partner',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'hierarchical' => true,
            'rewrite' => array("slug"=>"partners"),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-areas.png',
            'labels' => array (
                'name' => 'Partners',
                'singular_name' => 'Partner',
                'menu_name' => 'Partner',
                'add_new' => 'Novo Partner',
                'add_new_item' => 'Novo Partner',
                'edit' => 'Editar Partner',
                'edit_item' => 'Editar Partner',
                'new_item' => 'Novo Partner',
                'view' => 'Ver Partner',
                'view_item' => 'Ver Partner',
                'search_items' => 'Buscar Partner',
                'not_found' => 'No Partner Found',
                'not_found_in_trash' => 'No Partner Found in Trash',
                'parent' => 'Parent Partner',
            ),
        ));
    
        // register_taxonomy('Type', array('services'), array(
        //     'hierarchical' => true,
        //     'labels' => array(
        //         'name' => __('Tipo'),
        //         'singular_name' => __('Tipo'),
        //         'search_items' => __('Buscar'),
        //         'popular_items' => __('Mais usados'),
        //         'all_items' => __('Todos os Tipos'),
        //         'parent_item' => null,
        //         'parent_item_colon' => null,
        //         'edit_item' => __('Editar Tipo'),
        //         'update_item' => __('Atualizar'),
        //         'add_new_item' => __('Adicionar Tipo'),
        //         'new_item_name' => __('Novo Tipo')
        //     ),
        //     'singular_label' => 'Tipo',
        //     'all_items' => 'Todos Tipos',
        //     'query_var' => true,
        //     'rewrite' => array('slug' => 'tipo'))
        // );
        
        flush_rewrite_rules();
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
    }
    
    public function addCustomFields(){
        //add_meta_box("ServicesCustomFields","Dados do Partner",array(&$this,"formCustomFields"),"services","normal","low");
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        // $link_default = (isset($data["link_default"])) ? $data["link_default"][0] : '';
        // $label = (isset($data["label"])) ? $data["label"][0] : '';
        // $status_registration = (isset($data["status_registration"])) ? $data["status_registration"][0] : '';
        // $our_courses = (isset($data["our_courses"])) ? $data["our_courses"][0] : '';
        // $edital_registration = (isset($data["edital_registration"])) ? $data["edital_registration"][0] : '';
        // $template = (isset($data["template"])) ? $data["template"][0] : '';
        // $result = (isset($data["result"])) ? $data["result"][0] : '';
        // $discount = (isset($data["discount"])) ? $data["discount"][0] : '';
        // $registration = (isset($data["registration"])) ? $data["registration"][0] : '';
        // $orientation_of_registration = (isset($data["orientation_of_registration"])) ? $data["orientation_of_registration"][0] : '';
        // $aux_registration = (isset($data["aux_registration"])) ? $data["aux_registration"][0] : '';
        // $aux2_registration = (isset($data["aux2_registration"])) ? $data["aux2_registration"][0] : '';
        // $description = (isset($data["description"])) ? $data["description"][0] : '';
        // $closed_vestibular = (isset($data["closed_vestibular"])) ? $data["closed_vestibular"][0] : '';
        $size_file = (isset($data["size_file"])) ? $data["size_file"][0] : '';
        
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        //$units = Units::getListUnits();
        
        ?>
        <p>
            <label for="size_file">Tamanho do Arquivo: </label>
            <input type="text" name="size_file" id="size_file" class="url" style="width:400px" value="<?php echo $size_file;?>" />
        </p>
        <!-- <p>
            <label for="description">Descrição do Vestibular: </label>
            <input type="text" name="description" id="description" class="url" style="width:400px" value="<?php echo $description;?>" />
        </p>
        
        <p>
            <label for="linkregistration">Status: </label>
            <select name="status_registration" id="statusregistration">
                <?php foreach($this->status as $key => $status){?>
                <option value="<?php echo $key;?>" <?php echo ($status_registration==$key)? 'selected="selected"' : '';?>><?php echo $status;?></option>
                <?php }?>
            </select>
        </p>
         <p>
            <label for="ourCourses">Conheça Nossos Cursos: </label>
            <input type="text" name="our_courses" id="ourCourses" class="url" style="width:400px" value="<?php echo $our_courses;?>" />
        </p>
        
        <p>
            <label for="editalregistration">Edital: </label>
            <?php wp_editor($edital_registration, "edital_registration", array("textarea_name" => "edital_registration")); ?>
        </p>
        
        <p>
            <label for="template">Gabarito: </label>
            <?php wp_editor($template, "template", array("textarea_name" => "template")); ?>
        </p>
        <p>
            <label for="result">Resultados: </label>
            <?php wp_editor($result, "result", array("textarea_name" => "result")); ?>
        </p>
        <p>
            <label for="result">Descontos Especiais: </label>
            <?php wp_editor($discount, "discount", array("textarea_name" => "discount")); ?>
        </p>
        <p>
            <label for="registration">Matrícula: </label>
            <input type="text" name="registration" id="registration" class="url" style="width:400px" value="<?php echo $registration;?>" />
        </p>
        <p>
            <label for="link_default">Link botao: </label>
            <input type="text" name="link_default" id="link_default" class="url" style="width:400px" value="<?php echo $link_default;?>" />
        </p>
        <p>
            <label for="label">Rotulo botao: </label>
            <input type="text" name="label" id="label" class="url" style="width:400px" value="<?php echo $label;?>" />
        </p>
        <p>
            <label for="orientation_of_registration">Orientações de Matrícula: </label>
          <input type="text" name="orientation_of_registration" id="orientation_of_registration" class="url" style="width:400px" value="<?php echo $orientation_of_registration;?>" />
              <?php wp_editor($orientation_of_registration, "orientation_of_registration", array("textarea_name" => "orientation_of_registration")); ?>
        </p>
        <p>
            <label for="aux_registration">Dúvidas Frequentes:</label>
            <?php wp_editor($aux_registration, "aux_registration", array("textarea_name" => "aux_registration")); ?>
        </p>
        <p>
            <label for="aux2_registration">Contato:</label>
            <?php wp_editor($aux2_registration, "aux2_registration", array("textarea_name" => "aux2_registration")); ?>
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

        if( isset( $_POST['size_file'] ) )  
            update_post_meta( $postId, 'size_file', $_POST['size_file']);

        // if( isset( $_POST['link_default'] ) )  
        //     update_post_meta( $postId, 'link_default', $_POST['link_default']);

        // if( isset( $_POST['link_courses'] ) )  
        //     update_post_meta( $postId, 'link_courses', $_POST['link_courses']);

        // if( isset( $_POST['closed_vestibular'] ) )  
        //     update_post_meta( $postId, 'closed_vestibular', $_POST['closed_vestibular']);

        // if( isset( $_POST['description'] ) )  
        //     update_post_meta( $postId, 'description', $_POST['description']);

        // if( isset( $_POST['status_registration'] ) )  
        //     update_post_meta( $postId, 'status_registration', $_POST['status_registration']);

        // if( isset( $_POST['our_courses'] ) )  
        //     update_post_meta( $postId, 'our_courses',$_POST['our_courses']);  

        // if( isset( $_POST['edital_registration'] ) )  
        //     update_post_meta( $postId, 'edital_registration',$_POST['edital_registration']); 

        // if( isset( $_POST['template'] ) )  
        //     update_post_meta( $postId, 'template', $_POST['template']);

        // if( isset( $_POST['result'] ) )  
        //     update_post_meta( $postId, 'result', $_POST['result']);

        // if( isset( $_POST['discount'] ) )  
        //     update_post_meta( $postId, 'discount', $_POST['discount']);

        // if( isset( $_POST['registration'] ) )  
        //     update_post_meta( $postId, 'registration', $_POST['registration']);

        // if( isset( $_POST['orientation_of_registration'] ) )  
        //     update_post_meta( $postId, 'orientation_of_registration', $_POST['orientation_of_registration']);  

        // if( isset( $_POST['aux_registration'] ) )  
        //     update_post_meta( $postId, 'aux_registration',$_POST['aux_registration']);  

        // if( isset( $_POST['aux2_registration'] ) )  
        //     update_post_meta( $postId, 'aux2_registration', $_POST['aux2_registration']);
          
    }
       
}
?>