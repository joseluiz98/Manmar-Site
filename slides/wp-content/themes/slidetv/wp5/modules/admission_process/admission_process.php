<?php
class Admission_process{

    public $status = array(
        1 => 'Vestibular Aberto',
        2 => 'gabaritos',
        3 => 'Resultado do Vestibular',
        4 => 'Vagas Remanescentes'
    );
    
    public function Admission_process(){
       
        $this->createCustomPostType();
        
    }
    
    public function getAllAdmissions($options = array()){
        
        
        $args = array("post_type"=>"admissions","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }

    public function createCustomPostType(){
        
        register_post_type('admissions', array(	
            'label' => 'Processo Seletivo',
            'description' => 'Cadastro de processo Seletivo',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'page',
            'hierarchical' => true,
            'rewrite' => array("slug"=>"processo-seletivo"),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail','page-attributes'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-highlights.png',
            'labels' => array (
                'name' => 'Processos Seletivos',
                'singular_name' => 'Processo Seletivo',
                'menu_name' => 'Processo Seletivo',
                'add_new' => 'Novo Processo',
                'add_new_item' => 'Novo Processo',
                'edit' => 'Editar',
                'edit_item' => 'Editar Processo',
                'new_item' => 'Novo Processo',
                'view' => 'Ver Processo',
                'view_item' => 'Ver Processo',
                'search_items' => 'Buscar Processos',
                'not_found' => 'No Processo Found',
                'not_found_in_trash' => 'No Processo Found in Trash',
                'parent' => 'Parent Processo',
            ),
        ));
        
        flush_rewrite_rules();
        
        add_action( 'add_meta_boxes', array( &$this, 'addCustomFields' ) );
        add_action( 'save_post', array( &$this, 'saveCustomFields' ) );
  
    }
    
    public function addCustomFields(){
        add_meta_box("admissionsCustomFields","Dados Processo Seletivo",array(&$this,"formCustomFields"),"admissions","normal","low");
    }
    
    public function formCustomFields(){
        
        global $post;
        
        $data = get_post_custom($post->ID);
        
        $aux_admission = (isset($data["aux_admission"])) ? $data["aux_admission"][0] : '';
        $aux2_admission = (isset($data["aux2_admission"])) ? $data["aux2_admission"][0] : '';
        $status_admission = (isset($data["status_admission"])) ? $data["status_admission"][0] : '';
        $date_admission = (isset($data["date_admission"])) ? $data["date_admission"][0] : '';
        $edital_admission = (isset($data["edital_admission"])) ? $data["edital_admission"][0] : '';
        $vacancies_admission = (isset($data["vacancies_admission"])) ? $data["vacancies_admission"][0] : '';
        $price_admission = (isset($data["price_admission"])) ? $data["price_admission"][0] : '';
        $docs_admission = (isset($data["docs_admission"])) ? $data["docs_admission"][0] : '';
        $date_process = (isset($data["date_process"])) ? $data["date_process"][0] : '';
        
        $link = (isset($data["link_admission"])) ? $data["link_admission"][0] : '';
        
        wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
        
        $units = Units::getListUnits();
        
        ?>
        <p>
            <label for="linkAdmission">Status: </label>
            <select name="status_admission" id="statusAdmission">
                <?php foreach($this->status as $key => $status){?>
                <option value="<?php echo $key;?>" <?php echo ($status_admission==$key)? 'selected="selected"' : '';?>><?php echo $status;?></option>
                <?php }?>
            </select>
        </p>
        <p>
            <label for="auxAdmission">Texto Auxiliar:</label>
            <?php wp_editor($aux_admission, "auxAdmission", array("textarea_name" => "aux_admission")); ?>
        </p>
        <p>
            <label for="aux2Admission">Texto Auxiliar 2:</label>
            <?php wp_editor($aux2_admission, "aux2Admission", array("textarea_name" => "aux2_admission")); ?>
        </p>
         <p>
            <label for="dateAdmission">Data: </label>
            <input type="text" name="date_admission" id="dateAdmission" class="url" style="width:400px" value="<?php echo $date_admission;?>" />
        </p>
        <p>
            <label for="dateProcess">Período de inscrição: </label>
            <input type="text" name="date_process" id="dateProcess" class="url" style="width:400px" value="<?php echo $date_process;?>" />
        </p>
         <p>
            <label for="priceAdmission">Preço Inscrição: </label>
            <input type="text" name="price_admission" id="priceAdmission" class="url" style="width:400px" value="<?php echo $price_admission;?>" />
        </p>
        <p>
            <?php if($edital_admission!=""){?>    
            	<a href="<?php echo $edital_admission;?>" title="" class="one" target="_BLANK">Edital Atual</a><br />
            <?php }?>
            <label for="editalAdmission">Edital: </label>
            <input type="file" name="edital_admission" />
        </p>
        <p>
            <?php if($vacancies_admission!=""){?>    
            	<a href="<?php echo $vacancies_admission;?>" title="" class="one" target="_BLANK">Vagas Atual</a><br />
            <?php } ?>
            <label for="vacanciesAdmission">Manual do Candidato: </label>
            <input type="file" name="vacancies_admission" />
        </p>
        <p>
            <?php if($docs_admission!=""){?>
            	<a href="<?php echo $docs_admission;?>" title="" class="one" target="_BLANK">Documentação Atual</a><br />
                <?php }?>
            <label for="docsAdmission">Documentação: </label>
            <input type="file" name="docs_admission" />
        </p>
        <p>
            <label for="linkAdmission">Link Inscrição: </label>
            <input type="text" name="link_admission" id="linkAdmission" class="url" style="width:400px" value="<?php echo $link;?>" />
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
        if (isset($_FILES["edital_admission"]) && $_FILES["edital_admission"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["edital_admission"], array('test_form' => false));

            update_post_meta($postId, "edital_admission", $upload["url"]);
        }
        
        if (isset($_FILES["vacancies_admission"]) && $_FILES["vacancies_admission"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["vacancies_admission"], array('test_form' => false));

            update_post_meta($postId, "vacancies_admission", $upload["url"]);
        }
        
        if (isset($_FILES["docs_admission"]) && $_FILES["docs_admission"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["docs_admission"], array('test_form' => false));

            update_post_meta($postId, "docs_admission", $upload["url"]);
        }
        
        if( isset( $_POST['aux_admission'] ) )  
            update_post_meta( $postId, 'aux_admission',$_POST['aux_admission']);  

        if( isset( $_POST['aux2_admission'] ) )  
            update_post_meta( $postId, 'aux2_admission', $_POST['aux2_admission']);
        
        if( isset( $_POST['date_admission'] ) )  
            update_post_meta( $postId, 'date_admission', $_POST['date_admission']);

        if( isset( $_POST['link_admission'] ) )  
            update_post_meta( $postId, 'link_admission', $_POST['link_admission']);

        if( isset( $_POST['price_admission'] ) )  
            update_post_meta( $postId, 'price_admission', $_POST['price_admission']);

        if( isset( $_POST['status_admission'] ) )  
            update_post_meta( $postId, 'status_admission', $_POST['status_admission']);

        if( isset( $_POST['date_process'] ) )  
            update_post_meta( $postId, 'date_process', $_POST['date_process']);
    }
    
    
    
}

?>