<?php

class Courses {

    public $fields = array(
        "area_course",
        "unit_course",
        "level_course",
        "level_course_two",
        "coordinator_course",
        "formation_course",
        "duration_course",
        "modality_course",
        "workload_course",
        "hour_course",
        "mec_course",
        "cost_course",
        "location_course",
        "info_course",
        "evaluation_course",
        "grid_course",
        "blog_course"
    );

    public function getCourses($options = array()) {

        $args = array("post_type" => "courses", 'orderby' => 'menu_order', "order" => "ASC", "posts_per_page" => -1);

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getListCourses($options = array()) {

        $data = self::getCourses($options);

        $courses = array();

        while ($data->have_posts()) {
            $data->the_post();
            $courses[get_the_ID()] = get_the_title();
        }

        return $courses;
    }

    public function getCourseById($course_id) {

        $args = array("p" => $course_id);

        return new WP_Query($args);
    }

    public function getCoursesByUnit($unit_id = null, $options = array()) {

        $args = array(
            "post_type" => "courses",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "unit_course",
                    "value" => $unit_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getCoursesByArea($area_id = null, $options = array()) {

        $args = array(
            "post_type" => "courses",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_course",
                    "value" => $area_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getCoursesByLevel($level_id = null, $options = array()) {

        $args = array(
            "post_type" => "courses",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "level_course",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }
        //debug($args);
        return new WP_Query($args);
    }

    public function getCoursesByAreaAndLevel($area_id = null, $level_id = null, $options = array()) {


        $args = array(
            "post_type" => "courses",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_course",
                    "value" => $area_id),
                array("key" => "level_course",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getCourserByMeta($metaArr,$options=array()){

        $args = array(
            "post_type" => "courses",
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

    public function getListCoursesByArea($area_id = null) {

        $data = self::getCoursesByArea($area_id);

        $courses = array();

        while ($data->have_posts()) {
            $data->the_post();
            $courses[get_the_ID()] = get_the_title();
        }

        return $courses;
    }

    public function createCustomPostType() {

        register_post_type('courses', array(
            'label' => 'Câmbios',
            'description' => 'Cadastro de Câmbio',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'cambios'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title','thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-highlights.png',
            'labels' => array(
                'name' => 'Câmbios',
                'singular_name' => 'Câmbio',
                'menu_name' => 'Câmbios',
                'add_new' => 'Novo Câmbio',
                'add_new_item' => 'Novo Câmbio',
                'edit' => 'Editar',
                'edit_item' => 'Editar Câmbio',
                'new_item' => 'Novo Câmbio',
                'view' => 'Ver Câmbio',
                'view_item' => 'Ver Câmbio',
                'search_items' => 'Buscar Câmbios',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Câmbio',
            ),
        ));
        
        add_filter('manage_edit-courses_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_courses_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
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
            $unit_id = get_post_meta($post_id,"unit_course",true);
            if($unit_id!=""){
                echo get_the_title($unit_id);
            }else{
                echo "";
            }
        }    
    }
    
    public function addCustomFields() {

        add_meta_box("courseCustomFields", "Dados do Câmbio", array(&$this, "formCustomFields"), "courses", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);


        foreach ($this->fields as $field) {
            $$field = (isset($data[$field])) ? $data[$field][0] : '';
        }

        $grid_course = (isset($data["grid_course"])) ? $data["grid_course"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

        $argsAreas = array("orderby" => "title", "order" => "asc");
        $areas = Areas::getListAreas($argsAreas);

        $argsLevels = array("orderby" => "title", "order" => "asc");
        $levels = Levels::getListLevels($argsLevels);
        
        $argsCountries = array("orderby" => "title", "order" => "asc");
        $countries = Countries::getListCountries($argsCountries);

        
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
            <label for="coordinatorCourse">Tipo *: </label>
            <select name="coordinator_course" style="width:300px" id="coordinatorCourse" required>
                <option value="">Selecione um Tipo</option>
                <?php foreach ($coordinators as $key => $coordinator) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($coordinator_course == $key) ? 'selected="selected"' : ''; ?>><?php echo $coordinator; ?></option>
                <?php } ?>
            </select>            
        </p>
        <p>
            <label for="unitCourse">Lojas *: </label>
            <select name="unit_course" style="width:300px" id="unitCourse" required>
                <option value="">Selecione uma loja</option>
                <?php foreach ($units as $key => $unit) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($unit_course == $key) ? 'selected="selected"' : ''; ?>><?php echo $unit; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="unitCourse">País *: </label>
            <select name="location_course" style="width:300px" id="unitCourse">
                <option value="">Selecione uma País</option>
                <?php foreach ($countries as $key => $country) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($location_course == $key) ? 'selected="selected"' : ''; ?>><?php echo $country; ?></option>
                <?php } ?>
            </select>
        </p>      
        <p>
            <label for="areaCourse">Taxa de Câmbio: </label>
            <select name="area_course" style="width:300px" id="areaCourse">
                <option value="">Selecione uma taxa</option>
                <?php foreach ($areas as $key => $area) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($area_course == $key) ? 'selected="selected"' : ''; ?>><?php echo $area; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="areaCourse">Moeda 1: </label>
            <select name="level_course" style="width:300px" id="levelCourse">
                <option value="">Selecione a moeda do envio</option>
                <?php foreach ($levels as $key => $level) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($level_course == $key) ? 'selected="selected"' : ''; ?>><?php echo $level; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="areaCourse">Moeda 2: </label>
            <select name="level_course_two" style="width:300px" id="levelCourseTwo">
                <option value="">Selecione a moeda do recebimento</option>
                <?php foreach ($levels as $key => $level) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($level_course_two == $key) ? 'selected="selected"' : ''; ?>><?php echo $level; ?></option>
                <?php } ?>
            </select>
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

        // Salvando dados do formulário


        if (isset($_FILES["grid_course"]) && $_FILES["grid_course"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["grid_course"], array('test_form' => false));

            update_post_meta($postId, "grid_course", $upload["url"]);
        }

        foreach ($this->fields as $field) {

            if (isset($_POST[$field])) {

                update_post_meta($postId, $field, $_POST[$field]);
            }
        }
    }
}
?>