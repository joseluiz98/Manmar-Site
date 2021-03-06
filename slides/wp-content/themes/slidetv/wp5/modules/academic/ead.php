<?php

class Eads {

    public $fields = array(
        "area_ead",
        "unit_ead",
        "level_ead",
        "coordinator_ead",
        "formation_ead",
        "duration_ead",
        "modality_ead",
        "workload_ead",
        "hour_ead",
        "mec_ead",
        "cost_ead",
        "location_ead",
        "presentation_ead",
        "academic_information_ead",
        "selection_process_ead",
        "productions_ead",
        "program_ead",
        "info_ead",
        "evaluation_ead",
        "grid_ead",
        "blog_ead",
        "course_recognition",
        "additional_information",
        "activities_course",
        "link_ead",
        "working_areas",
        "text_presentation_ead",
        "text_academic_information_ead",
        "text_selection_process_ead",
        "text_productions_ead",
        "text_program_ead",
        "text_lines_of_research",
        "text_infra",
        "text_docentes",
        "text_discentes",
        "text_coordenacao",
        "text_curricular",
        "text_documentos",
        "text_egressos",
        "text_qualifications_and_defenses", 
        "text_student_in_special_scheme", 
        "text_schedule_of_classes",
        "text_proof_of_proficiency", 
        "text_supported_by_fapesp",
        "frequencyof_travel",
        "relation_course_",
        "relation_graduation_",
        "relation_phd_"

        
    );

    public function getEads($options = array()) {

        $args = array("post_type" => "eads", "orderby" => "title", "order" => "ASC", "posts_per_page" => -1);

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getListEads($options = array()) {

        $data = self::getEads($options);

        $ead = array();

        while ($data->have_posts()) {
            $data->the_post();
            $ead[get_the_ID()] = get_the_title();
        }

        return $ead;
    }

    public function getEadsById($ead_id) {

        $args = array("p" => $ead_id);

        return new WP_Query($args);
    }

    public function getEadsByUnit($unit_id = null, $options = array()) {

        $args = array(
            "post_type" => "ead",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "unit_ead",
                    "value" => $unit_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getEadsByArea($area_id = null, $options = array()) {

        $args = array(
            "post_type" => "eads",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_ead",
                    "value" => $area_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getEadsByLevel($level_id = null, $options = array()) {

        $args = array(
            "post_type" => "eads",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "level_ead",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }
        //debug($args);
        return new WP_Query($args);
    }

    public function getEadsByAreaAndLevel($area_id = null, $level_id = null, $options = array()) {


        $args = array(
            "post_type" => "ead",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_ead",
                    "value" => $area_id),
                array("key" => "level_ead",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getEadsByMeta($metaArr,$options=array()){

        $args = array(
            "post_type" => "eads",
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

    public function getListEadsByArea($area_id = null) {

        $data = self::getEadsByArea($area_id);

        $ead = array();

        while ($data->have_posts()) {
            $data->the_post();
            $ead[get_the_ID()] = get_the_title();
        }

        return $courses;
    }

    public function createCustomPostType() {

        register_post_type('eads', array(
            'label' => 'EAD',
            'description' => 'Cadastro de Curso',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'ead'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-courses.png',
            'labels' => array(
                'name' => 'EAD',
                'singular_name' => 'EAD',
                'menu_name' => 'EAD',
                'add_new' => 'Novo Curso',
                'add_new_item' => 'Novo Curso',
                'edit' => 'Editar',
                'edit_item' => 'Editar Curso',
                'new_item' => 'Novo Curso',
                'view' => 'Ver Curso',
                'view_item' => 'Ver Curso',
                'search_items' => 'Buscar Cursos',
                'not_found' => 'No Destaques Found',
                'not_found_in_trash' => 'No Destaques Found in Trash',
                'parent' => 'Parent Curso',
            ),
        ));
        
        add_filter('manage_edit-courses_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_graduations_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
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
            $unit_id = get_post_meta($post_id,"unit_ead",true);
            if($unit_id!=""){
                echo get_the_title($unit_id);
            }else{
                echo "";
            }
        }
        
    }
    
    public function addCustomFields() {

        add_meta_box("courseCustomFields", "Dados do Curso", array(&$this, "formCustomFields"), "eads", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);


        foreach ($this->fields as $field) {
            $$field = (isset($data[$field])) ? $data[$field][0] : '';
        }

        $grid_ead = (isset($data["grid_ead"])) ? $data["grid_ead"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

        $argsAreas = array("orderby" => "title", "order" => "asc");
        $areas = Areas::getListAreas($argsAreas);

        $argsLevels = array("orderby" => "title", "order" => "asc");
        $levels = Levels::getListLevels($argsLevels);
        
        $argsCourses = array("orderby" => "title","order" => "asc");
        $courses = Courses::getCourses($argsCourses);

        $argsGraduations = array("orderby" => "title","order" => "asc");
        $graduations = Graduations::getGraduation($argsGraduations);

        $argsPhds = array("orderby" => "title","order" => "asc");
        $phds = Phds::getPhds($argsPhds);

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
            <label for="activitiesCourse" style="font-weight:800;font-size:18px;">Atividades do Curso:</label>
            <?php wp_editor($activities_course, "activities_course", array("textarea_name" => "activities_course")); ?>
        </p>
        <p>
            <label for="workingareas"style="font-weight:800;font-size:18px;">Mercado de Trabalho e Areas de Atuação:</label>
            <?php wp_editor($working_areas, "working_areas", array("textarea_name" => "working_areas")); ?>
        </p>

        <!-- RAIO X -->

        <p>
            <label for="durationCourse"style="font-weight:800;font-size:18px;">Titulação:</label>
            <input type="text" name="formation_graduation" id="formation_graduation" value="<?php echo $formation_graduation; ?>" style="width:300px"/>
        </p>

        <p>
            <label for="hourCourse"style="font-weight:800;font-size:18px;">Periodo do Curso:</label>
            <input type="text" name="hour_graduation" id="hour_graduation" value="<?php echo $hour_graduation; ?>" style="width:300px"/>
        </p>

        <p>
            <label for="frequencyofTravel"style="font-weight:800;font-size:18px;">Periodicidade do Curso:</label>
            <input type="text" name="frequencyof_travel" id="frequencyofTravel" value="<?php echo $frequencyof_travel; ?>" style="width:300px"/>
        </p>

         <p>
            <label for="durationCourse"style="font-weight:800;font-size:18px;">Duração do curso: </label>
            <input type="text" name="duration_graduation" id="duration_graduation" value="<?php echo $duration_graduation; ?>" style="width:300px"/>
        </p>

        <p>
            <label for="workloadCourse"style="font-weight:800;font-size:18px;">Carga Horária: </label>
            <input type="text" name="workload_graduation" id="workload_graduation" value="<?php echo $workload_graduation; ?>" style="width:300px"/>
        </p>

        <p>
            <label for="coordinatorCourse"style="font-weight:800;font-size:18px;">Fale com o Coordenador: </label>
            <input type="text" name="coordinator_graduation" id="coordinator_graduation" value="<?php echo $coordinator_graduation; ?>" style="width:300px"/>       
        </p>       
        
        <p>
            <label for="locationCourse"style="font-weight:800;font-size:18px;">Previsão de início do Curso: </label>
            <input type="text" name="location_graduation" id="location_graduation" value="<?php echo $location_graduation; ?>" style="width:300px;"></input>
        </p>


        <p>
            <label for="areaCourse"style="font-weight:800;font-size:18px;">Area do Conhecimento: </label>
            <select name="area_ead" style="width:300px" id="area_ead">
                <option value="">Selecione uma Área</option>
                <?php foreach ($areas as $key => $area) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($area_ead == $key) ? 'selected="selected"' : ''; ?>><?php echo $area; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="areaCourse"style="font-weight:800;font-size:18px;">Nível de Ensino: </label>
            <select name="level_graduation" style="width:300px" id="level_graduation">
                    <option value="1051">EAD</option>
            </select>
        </p>
        <p>
            <label for="link_graduation"style="font-weight:800;font-size:18px;">Link Inscrição:</label>
            <input type="text" name="link_graduation" id="link_graduation" value="<?php echo $link_graduation; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="locationCourse"style="font-weight:800;font-size:18px;">Informaçoes Adicionais:</label>
            <?php wp_editor($additional_information, "additional_information", array("textarea_name" => "additional_information")); ?>
        </p>
        <p>    
        <h3 class="hndle">Cursos de graduação relacionados:</h3>         
        <ul>
        <br/>

        <?php

            $id_course_current = $_GET['post'];

            $i=0;
            foreach ($courses->posts as $key => $course):
                $id_course = $course->ID;

                $url = get_post_permalink($id_course);

                    $results = get_post_meta($id_course_current, 'relation_course_'.$i, true);

                    $val_grad = explode('|', $results);
                    ?>         
                    <li style="font-size:14px;"><p><?php echo $course->post_title; ?></p></li>
                    <div class="status" style="position: relative;right: 225px;top: -25px;float: right;">
                        <label><input type="radio" name="data[relation_course_<?php echo $i; ?>]" 
                            value="<?php echo $course->ID; ?>|<?php echo $url; ?>|<?php echo $course->post_title; ?>"
                            <?php echo ($val_grad[0] == $id_course) ? 'checked="checked"' : '' ?>/> 
                            Sim
                        </label>
                        <label><input type="radio" name="data[relation_course_<?php echo $i; ?>]" value="0" <?php echo ($val_grad[0] != $id_course) ? 'checked="checked"' : '' ?> />Não</label>
                    </div>
                    <hr>
                <?php
                $i++;
            endforeach;
        wp_reset_postdata();
        ?>
        </ul>          
        </p>

        <p>    
        <h3 class="hndle">Cursos de Pós-graduação relacionados:</h3>         
            <ul>
            <br/>
            <?php
                $i=0;
                foreach ($graduations->posts as $key => $graduation):

                    $id_graduation = $graduation->ID;

                    $url = get_post_permalink( $id_graduation );

                    $args = get_post_meta($id_course_current, 'relation_graduation_'.$i, true);
                    
                    $val_pos = explode('|', $args);

                    ?>         
                    <li style="font-size:14px;"><p><?php echo $graduation->post_title; ?></p></li>
                        <div class="status" style="position: relative;right: 225px;top: -25px;float: right;">
                            <label><input type="radio" name="data[relation_graduation_<?php echo $i; ?>]" 
                                value="<?php echo $graduation->ID; ?>|<?php echo $url; ?>|<?php echo $graduation->post_title; ?>"
                                <?php echo ($val_pos[0] == $id_graduation) ? 'checked="checked"' : '' ?>/> 
                                Sim
                            </label>
                            <label><input type="radio" name="data[relation_graduation_<?php echo $i; ?>]" value="0" <?php echo ($val_pos[0] != $id_graduation) ? 'checked="checked"' : '' ?> />Não</label>
                        </div>
                        <hr>
                    <?php
                    $i++;
                endforeach;
                ?>
            </ul>       
        </p>
        <p>    
        <h3 class="hndle">Cursos de Mestrado relacionados:</h3>         
            <ul>
            <br/>
            <?php
                $i=0;
                foreach ($phds->posts as $key => $phd):

                    $id_phd = $phd->ID;

                    $url = get_post_permalink($id_phd);

                    $args = get_post_meta($id_course_current, 'relation_phd_'.$i, true);
                    
                    $val_phd = explode('|', $args);

                    ?>         
                    <li style="font-size:14px;"><p><?php echo $phd->post_title; ?></p></li>
                        <div class="status" style="position: relative;right: 225px;top: -25px;float: right;">
                            <label><input type="radio" name="data[relation_phd_<?php echo $i; ?>]" 
                                value="<?php echo $phd->ID; ?>|<?php echo $url; ?>|<?php echo $phd->post_title; ?>"
                                <?php echo ($val_phd[0] == $id_phd) ? 'checked="checked"' : '' ?>/> 
                                Sim
                            </label>
                            <label><input type="radio" name="data[relation_phd_<?php echo $i; ?>]" value="0" <?php echo ($val_phd[0] != $id_phd) ? 'checked="checked"' : '' ?> />Não</label>
                        </div>
                        <hr>
                    <?php
                    $i++;
                endforeach;
                ?>
            </ul>       
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


        if (isset($_FILES["grid_ead"]) && $_FILES["grid_ead"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["grid_ead"], array('test_form' => false));

            update_post_meta($postId, "grid_ead", $upload["url"]);
            
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

        update_post_meta($postId, "grid_ead", $upload["url"]);
    }

}
?>