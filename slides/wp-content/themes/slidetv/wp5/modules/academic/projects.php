<?php

class Projects {

    public $fields = array(
        "area_project",
        "unit_project",
        "level_project",
        "link_project",
        "coordinator_project",
        "formation_project",
        "duration_project",
        "modality_project",
        "object_project",
        "public_project",
        "statistic_project",
        "methodology_project",
        "values_project",
        "inscriptions_project",
        "questions_project",
        "workload_project",
        "hour_project",
        "mec_project",
        "cost_project",
        "contact_project",
        "activities_project",
        "location_project",
        "info_project",
        "additional_information_project",
        "evaluation_project",
        "grid_project",
        "blog_project",
        "project_recognition",
        "relation_project"
    );

   public function getAllProjects($options = array()){
        
        
        $args = array("post_type"=>"projects","orderby"=>"post_date","order"=>"DESC","posts_per_page"=>-1);
        
        foreach($options as $key => $option){
            
            $args[$key] = $option;
            
        }
        
        return new WP_Query($args);
        
    }

    public function getListProjects($options = array()) {

        $data = self::getProjects($options);

        $phds = array();

        while ($data->have_posts()) {
            $data->the_post();
            $phd[get_the_ID()] = get_the_title();
        }

        return $phds;
    }

    public function getProjectById($project_id) {

        $args = array("p" => $project_id);

        return new WP_Query($args);
    }

    public function getProjectByUnit($unit_id = null, $options = array()) {

        $args = array(
            "post_type" => "projects",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "project_id",
                    "value" => $unit_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getProjectByArea($area_id = null, $options = array()) {

        $args = array(
            "post_type" => "projects",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_project",
                    "value" => $area_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getProjectsByLevel($level_id = null, $options = array()) {

        $args = array(
            "post_type" => "projects",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "level_project",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }
        //debug($args);
        return new WP_Query($args);
    }

    public function getProjectsByAreaAndLevel($area_id = null, $level_id = null, $options = array()) {


        $args = array(
            "post_type" => "projects",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_project",
                    "value" => $area_id),
                array("key" => "level_project",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getProjectByMeta($metaArr,$options=array()){

        $args = array(
            "post_type" => "projects",
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

    public function getListProjectByArea($area_id = null) {

        $data = self::getprojectsByArea($area_id);

        $phds = array();

        while ($data->have_posts()) {
            $data->the_post();
            $phd[get_the_ID()] = get_the_title();
        }

        return $phds;
    }

    public function createCustomPostType() {
        
        register_post_type('projects', array(   
            'label' => 'Projetos de Extensão',
            'description' => 'Projetos de Extensão',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'projetos'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','editor','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory").'/wp5/img/icon-highlights.png',
            'labels' => array (
                'name' => 'Projetos de Extensão',
                'singular_name' => 'Projeto',
                'menu_name' => 'Projetos de Extensão',
                'add_new' => 'Novo Projeto',
                'add_new_item' => 'Novo Projeto',
                'edit' => 'Editar',
                'edit_item' => 'Editar Projeto',
                'new_item' => 'Novo Projeto',
                'view' => 'Ver Projeto',
                'view_item' => 'Ver Projeto',
                'search_items' => 'Buscar Projetos de Extensão',
                'not_found' => 'No Projetos de Extensão Found',
                'not_found_in_trash' => 'No Projetos de Extensão Found in Trash',
                'parent' => 'Parent Projeto',
            ),
        ));
        
        add_filter('manage_edit-projects_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_projects_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
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

        add_meta_box("courseCustomFields", "Dados do Curso", array(&$this, "formCustomFields"), "projects", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);


        foreach ($this->fields as $field) {
            $$field = (isset($data[$field])) ? $data[$field][0] : '';
        }

        $grid_project = (isset($data["grid_project"])) ? $data["grid_project"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

        $argsAreas = array("orderby" => "title", "order" => "asc");
        $areas = Areas::getListAreas($argsAreas);

        $argsLevels = array("orderby" => "title", "order" => "asc");
        $levels = Levels::getListLevels($argsLevels);
       
        $argsProjects = array("orderby" => "title","order" => "asc");
        $project = Projects::getAllProjects($argsProjects);
        
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

        <!-- RAIO X --> 
        <p>
            <label for="areaCourse">Area do Conhecimento: </label>
            <select name="area_project" style="width:300px" id="areaCourse">
                <option value="">Selecione uma Área</option>
                <?php foreach ($areas as $key => $area) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($area_project == $key) ? 'selected="selected"' : ''; ?>><?php echo $area; ?></option>
                <?php } ?>
            </select>
        </p>
        
        <p>
            <label for="contact_project">Contato: </label>
            <input type="text" name="contact_project" id="contact_project" value="<?php echo $contact_project; ?>" style="width:300px"/>          
        </p>

        <p>
            <label for="hourPhd">Periodo:</label>
            <input type="text" name="hour_project" id="hourPhd" value="<?php echo $hour_project; ?>" style="width:300px"/>
        </p>

        <p>
            <label for="location_project">Local:</label>
            <input type="text" name="location_project" id="location_project" value="<?php echo $location_project; ?>" style="width:300px"/>
        </p>

        <p>
            <label for="durationPhd">Duração do curso: </label>
            <input type="text" name="duration_project" id="durationPhd" value="<?php echo $duration_project; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="link_project"style="font-weight:800;font-size:18px;">Link Inscrição:</label>
            <input type="text" name="link_project" id="link_project" value="<?php echo $link_project; ?>" style="width:300px"/>
        </p>  
        <p>
            <label for="costPhd">Investimento:</label>
            <?php wp_editor($cost_project, "cost_project", array("textarea_name" => "cost_project")); ?>
        </p>
        
        <!-- RAIO X --> 

        <!-- APRESENTAÇÂO DO PROJETO -->

        <p>
            <label for="objectProject">Objetivos: </label><br/>
            <?php wp_editor($object_project, "objectProject", array("textarea_name" => "object_project")); ?>
        </p>

        <p>
            <label for="publicProject">Público Alvo : </label><br/>
            <?php wp_editor($public_project, "publicProject", array("textarea_name" => "public_project")); ?>
        </p>
         <p>
            <label for="statisticProject">Estatística: </label><br/>
            <?php wp_editor($statistic_project, "statisticProject", array("textarea_name" => "statistic_project")); ?>
        </p>
        <p>
            <label for="methodologyProject">Metodologias: </label><br/>
            <?php wp_editor($methodology_project, "methodologyProject", array("textarea_name" => "methodology_project")); ?>
        </p>
        <!-- APRESENTAÇÂO DO PROJETO -->
        
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

    

        if (isset($_FILES["grid_project"]) && $_FILES["grid_project"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["grid_project"], array('test_form' => false));

            update_post_meta($postId, "grid_project", $upload["url"]);
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