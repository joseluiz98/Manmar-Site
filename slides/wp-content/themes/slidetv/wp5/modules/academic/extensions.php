<?php

class Extensions {

    public $fields = array(
        "area_course",
        "status_extension",
        "hour_extension",
        "link_extension",
        "location_extension",
        "duration_extension",
        "evaluation_extension",
        "vacancies_extension",
        "object_extension",
        "public_extension",
        "investment_extension",
        "statistic_project",
        "content_extension"
    );

   public function getAllExtensions($options = array()){
        
        
        $args = array("post_type"=>"extensions","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }

    public function getListExtensions($options = array()) {

        $data = self::getAllExtensions($options);

        $extensions = array();

        while ($data->have_posts()) {
            $data->the_post();
            $extension[get_the_ID()] = get_the_title();
        }

        return $extensions;
    }

    public function getExtensionById($extension_id) {

        $args = array("p" => $extension_id);

        return new WP_Query($args);
    }

    public function getExtensionByUnit($unit_id = null, $options = array()) {

        $args = array(
            "post_type" => "extensions",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "extension_id",
                    "value" => $unit_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getExtensionByArea($area_id = null, $options = array()) {

        $args = array(
            "post_type" => "extensions",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_extension",
                    "value" => $area_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getExtensionByStatus($status_id = null, $options = array()) {

        $args = array(
            "post_type" => "extensions",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "status_extension",
                    "value" => $status_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getExtensionsByLevel($level_id = null, $options = array()) {

        $args = array(
            "post_type" => "extensions",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "level_extension",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }
        //debug($args);
        return new WP_Query($args);
    }

    public function getExtensionsByAreaAndLevel($area_id = null, $level_id = null, $options = array()) {


        $args = array(
            "post_type" => "extensions",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_extension",
                    "value" => $area_id),
                array("key" => "level_extension",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getExtensionByMeta($metaArr,$options=array()){

        $args = array(
            "post_type" => "extensions",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1
        );

        $args["meta_query"] = array();

        foreach($metaArr as $key => $value){

            $args["meta_query"][]= array(
                "key"=>$key,
                "compare"=>"=",
                "value"=>$value
            );

        }


        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);

    }

    public function getListExtensionByArea($area_id = null) {

        $data = self::getextensionsByArea($area_id);

        $extensions = array();

        while ($data->have_posts()) {
            $data->the_post();
            $extension[get_the_ID()] = get_the_title();
        }

        return $extensions;
    }

    public function createCustomPostType() {
        
        register_post_type('extensions', array(   
            'label' => 'Cursos de Extensão',
            'description' => 'Cursos de Extensão',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'cursos-de-extensao'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-highlights.png',
            'labels' => array (
                'name' => 'Cursos de Extensão',
                'singular_name' => 'Curso de Extensão',
                'menu_name' => 'Cursos de Extensão',
                'add_new' => 'Novo Curso de Extensão',
                'add_new_item' => 'Novo Curso de Extensão',
                'edit' => 'Editar',
                'edit_item' => 'Editar Curso de Extensão',
                'new_item' => 'Novo Curso de Extensão',
                'view' => 'Ver Curso de Extensão',
                'view_item' => 'Ver Curso de Extensão',
                'search_items' => 'Buscar Cursos de Extensão',
                'not_found' => 'No Cursos de Extensão Found',
                'not_found_in_trash' => 'No Cursos de Extensão Found in Trash',
                'parent' => 'Parent Curso de Extensão',
            ),
        ));
        
        add_filter('manage_edit-extensions_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_extensions_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
        add_action('add_meta_boxes', array(&$this, 'addCustomFields'));
        add_action('save_post', array(&$this, 'saveCustomFields'));
    }
    
    public function manageCustomColumn($columns){
        
        unset($columns["date"]);
        
        $columns["unit"] = "Unidade";
        $columns["date"] = "Data";
        
        return $columns;
        
    }
    
    public function manageCustomColumnContent($column,$post_id){
        
        if($column=="unit"){
            $unit_id = get_post_meta($post_id,"unit_phd",true);
            if($unit_id!=""){
                echo get_the_title($unit_id);
            }else{
                echo "";
            }
        }
        
    }
    
    public function addCustomFields() {

        add_meta_box("courseCustomFields", "Dados do Curso de Extensão", array(&$this, "formCustomFields"), "extensions", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);


        foreach ($this->fields as $field) {
            $$field = (isset($data[$field])) ? $data[$field][0] : '';
        }

        $grid_extension = (isset($data["grid_extension"])) ? $data["grid_extension"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

        $argsAreas = array("orderby" => "title", "order" => "asc");
        $areas = Areas::getListAreas($argsAreas);

        $argsLevels = array("orderby" => "title", "order" => "asc");
        $levels = Levels::getListLevels($argsLevels);
       
        $argsProjects = array("orderby" => "title","order" => "asc");
        $project = Projects::getAllProjects($argsProjects);

        $argsExtensions = array("orderby" => "title","order" => "asc");
        $extension = Extensions::getAllExtensions($argsExtensions);
        
        $argsUnits = array();
        $current_user = wp_get_current_user();
        $unit_profile = get_user_meta($current_user->data->ID,"unit_profile",true);
        
        if(isset($current_user->caps['marketing']) && ($current_user->caps['marketing'])){
            $argsUnits["p"] = $unit_profile;
        }else{
            $argsUnits = array("orderby" => "title", "order" => "asc");
        }
        
        $units = Units::getListUnits($argsUnits);

        $argsCoordinators = array("orderby" => "title", "order" => "asc");
        $coordinators = Coordinators::getListCoordinators($argsCoordinators);
        ?>
        <p>
            <label for="areaCourse">Area do Conhecimento: </label>
            <select name="area_course" style="width:300px" id="areaCourse">
                <option value="">Selecione uma Área</option>
                <?php foreach ($areas as $key => $area) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($area_course == $key) ? 'selected="selected"' : ''; ?>><?php echo $area; ?></option>
                <?php } ?>
            </select>
        </p>    
        <p>
            <label for="areaCourse">Status da Inscrição do Curso: </label>
            <select name="status_extension" style="width:300px" id="status_extension">
                <option value="">Selecione o Status</option>
                <option value="1" <?php echo ($status_extension == 1) ? 'selected="selected"' : ''; ?> >Previsto</option>
                <option value="2" <?php echo ($status_extension == 2) ? 'selected="selected"' : ''; ?> >Aberto</option>
            </select>
        </p>
        <p>
            <label for="hourExtension">Periodo:</label>
            <input type="text" name="hour_extension" id="hourExtension" value="<?php echo $hour_extension; ?>" style="width:300px"/>
        </p>   
        <p>
            <label for="locationExtension">Local:</label>
            <input type="text" name="location_extension" id="locationExtension" value="<?php echo $location_extension; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="durationExtension">Duração do curso: </label>
            <input type="text" name="duration_extension" id="durationExtension" value="<?php echo $duration_extension; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="investmentExtension">Investimento: </label>
            <input type="text" name="investment_extension" id="investmentExtension" value="<?php echo $investment_extension; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="evaluationExtension">Fale com o Coordenador: </label>
            <input type="text" name="evaluation_extension" id="evaluationExtension" value="<?php echo $evaluation_extension; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="vacanciesExtension">Quantidade de vagas: </label>
            <input type="text" name="vacancies_extension" id="vacanciesExtension" value="<?php echo $vacancies_extension; ?>" style="width:300px"/>
        </p>        
        <p>
            <label for="link_extension"style="font-weight:800;font-size:18px;">Link Inscrição:</label>
            <input type="text" name="link_extension" id="link_extension" value="<?php echo $link_extension; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="objectProject">Objetivos: </label><br/>
            <?php wp_editor($object_extension, "objectExtension", array("textarea_name" => "object_extension")); ?>
        </p>

        <p>
            <label for="publicExtension">Público Alvo : </label><br/>
            <?php wp_editor($public_extension, "publicExtension", array("textarea_name" => "public_extension")); ?>
        </p>
         <p>
            <label for="statisticProject">Pré Requisitos: </label><br/>
            <?php wp_editor($statistic_project, "statisticProject", array("textarea_name" => "statistic_project")); ?>
        </p>
        <p>
            <label for="contentExtension">Conteúdo: </label><br/>
            <?php wp_editor($content_extension, "contentExtension", array("textarea_name" => "content_extension")); ?>
        </p>
    <?php
    }

    public function saveCustomFields($postId) {

        // Verificando se é um AUTOSAVE
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        // if our nonce isn't there, or we can't verify it, bail 
        if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce'))
            return;

        //verificando se o usuário pode editar o post
        if (!current_user_can('edit_post'))
            return;

    

        if (isset($_FILES["grid_extension"]) && $_FILES["grid_extension"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["grid_extension"], array('test_form' => false));

            update_post_meta($postId, "grid_extension", $upload["url"]);
        }

        if(isset($_POST['data'])){

            foreach ($_POST['data'] as $key => $value) {

                update_post_meta($postId, $key , $value);
                   
            }
            
        }

        foreach ($this->fields as $field) {

            if (isset($_POST[$field])) {

                update_post_meta($postId, $field, $_POST[$field]);
            }
        }

    }

}
?>