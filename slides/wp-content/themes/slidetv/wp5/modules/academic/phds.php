<?php

class Phds {

    public $fields = array(
        "area_phd",
        "unit_phd",
        "level_phd",
        "link_phd",
        "coordinator_phd",
        "formation_phd",
        "duration_phd",
        "modality_phd",
        "workload_phd",
        "hour_phd",
        "mec_phd",
        "cost_phd",
        "activities_phd",
        "working_areas",
        "location_phd",
        "info_phd",
        "additional_information_phd",
        "evaluation_phd",
        "grid_phd",
        "blog_phd",
        "phd_recognition",
        "relation_phd",
        "text_academic_information_phd",
        "text_selection_process_phd",
        "text_productions_phd",
        "hour_phd",
        "frequencyof_phd",
        "workload_phd",
        "coordinator_phd",
        "location_phd",
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
        "unit_course",
        "cost_phd",
        "duration_phd",
        "phd_recognition",
        "mec_phd",
        "evaluation_phd",
        "objects_phd",
        "additional_information_phd",
        "relation_course_",
        "relation_graduation_",
        "relation_phd_"

    );

    public function getPhds($options = array()) {

        $args = array("post_type" => "phds", "orderby" => "title", "order" => "ASC", "posts_per_page" => -1);
        
        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getListPhds($options = array()) {

        $data = self::getPhds($options);

        $phds = array();

        while ($data->have_posts()) {
            $data->the_post();
            $phd[get_the_ID()] = get_the_title();
        }

        return $phds;
    }

    public function getPhdById($phd_id) {

        $args = array("p" => $phd_id);

        return new WP_Query($args);
    }

    public function getPhdByUnit($unit_id = null, $options = array()) {

        $args = array(
            "post_type" => "phds",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "phd_id",
                    "value" => $unit_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getPhdByArea($area_id = null, $options = array()) {

        $args = array(
            "post_type" => "phds",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_phd",
                    "value" => $area_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getPhdsByLevel($level_id = null, $options = array()) {

        $args = array(
            "post_type" => "phds",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "level_phd",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }
        //debug($args);
        return new WP_Query($args);
    }

    public function getPhdsByAreaAndLevel($area_id = null, $level_id = null, $options = array()) {


        $args = array(
            "post_type" => "phds",
            "orderby" => "title",
            "order" => "ASC",
            "posts_per_page" => -1,
            "meta_query" => array(
                array("key" => "area_phd",
                    "value" => $area_id),
                array("key" => "level_phd",
                    "value" => $level_id)
            )
        );

        foreach ($options as $key => $option) {

            $args[$key] = $option;
        }

        return new WP_Query($args);
    }

    public function getPhdByMeta($metaArr,$options=array()){

        $args = array(
            "post_type" => "phds",
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

    public function getListPhdByArea($area_id = null) {

        $data = self::getphdsByArea($area_id);

        $phds = array();

        while ($data->have_posts()) {
            $data->the_post();
            $phd[get_the_ID()] = get_the_title();
        }

        return $phds;
    }

    public function createCustomPostType() {

        register_post_type('phds', array(
            'label' => 'Mestrado e Doutorado',
            'description' => 'Cadastro de Curso',
            'public' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'mestrado-e-doutorado'),
            'query_var' => true,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => get_bloginfo("stylesheet_directory") . '/wp5/img/icon-courses.png',
            'labels' => array(
                'name' => 'Mestrado e Doutorado',
                'singular_name' => 'Mestrado e Doutorado',
                'menu_name' => 'Mestrado e Doutorado',
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
        
        add_filter('manage_edit-phds_columns',array(&$this,"manageCustomColumn"));
        add_action('manage_phds_posts_custom_column',array(&$this,"manageCustomColumnContent"),10,2);
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

        add_meta_box("courseCustomFields", "Dados do Curso", array(&$this, "formCustomFields"), "phds", "normal", "low");
    }

    public function formCustomFields() {

        global $post;

        $data = get_post_custom($post->ID);


        foreach ($this->fields as $field) {
            $$field = (isset($data[$field])) ? $data[$field][0] : '';
        }

        $grid_phd = (isset($data["grid_phd"])) ? $data["grid_phd"][0] : '';

        wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');

        $argsAreas = array("orderby" => "title", "order" => "asc");
        $areas = Areas::getListAreas($argsAreas);

        $argsLevels = array("orderby" => "title", "order" => "asc");
        $levels = Levels::getListLevels($argsLevels);
       
        $argsPhds = array("orderby" => "title","order" => "asc");
        $phds = Phds::getPhds($argsPhds);

        $argsCourses = array("orderby" => "title","order" => "asc");
        $courses = Courses::getCourses($argsCourses);

        $argsGraduations = array("orderby" => "title","order" => "asc");
        $graduations = Graduations::getGraduation($argsGraduations);
        
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
            <label for="areaCourse"style="font-weight:800;font-size:18px;">Area do Conhecimento: </label>
            <select name="area_phd" style="width:300px" id="area_phd">
                <option value="">Selecione uma Área</option>
                <?php foreach ($areas as $key => $area) { ?>
                    <option value="<?php echo $key; ?>" <?php echo ($area_phd == $key) ? 'selected="selected"' : ''; ?>><?php echo $area; ?></option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="areaCourse">Nível de Ensino: </label>
            <select name="level_phd" style="width:300px;" id="levelCourse">
                    <option value="879">Mestrado, Doutorado e Pós Doutorado</option>
            </select>
        </p>
        <p>
            <label for="activitiesCourse" style="font-weight:800;font-size:18px;">Público-ALvo:</label>
            <?php wp_editor($activities_phd, "activities_phd", array("textarea_name" => "activities_phd")); ?>
        </p>
        <p>
            <label for="objects" style="font-weight:800;font-size:18px;">Objetivos:</label>
            <?php wp_editor($objects_phd, "objects_phd", array("textarea_name" => "objects_phd")); ?>
        </p>
        <p>
            <label for="workingareas"style="font-weight:800;font-size:18px;">Perfil do Egresso:</label>
            <?php wp_editor($working_areas, "working_areas", array("textarea_name" => "working_areas")); ?>
        </p>



        <!--ITENS DAS ABA LEITURA DE CURSOS MESTRADO E DOUTOURADO-->
        <p>
            <label for="locationCourse"style="font-weight:800;font-size:18px;">Programa</label>
            <?php //wp_editor($text_programPhd, "text_programPhd", array("textarea_name" => "text_programPhd")); ?>
        </p>

        <!-- Submenu Programas--> 

                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Áreas de concentração e linhas de pesquisa:</label>
                        <?php wp_editor($text_lines_of_research, "text_lines_of_research", array("textarea_name" => "text_lines_of_research")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Infra estrutura:</label>
                        <?php wp_editor($text_infra, "text_infra", array("textarea_name" => "text_infra")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Docentes:</label>
                        <?php wp_editor($text_docentes, "text_docentes", array("textarea_name" => "text_docentes")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Discentes:</label>
                        <?php wp_editor($text_discentes, "text_discentes", array("textarea_name" => "text_discentes")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Coordenação do Programa:</label>
                        <?php wp_editor($text_coordenacao, "text_coordenacao", array("textarea_name" => "text_coordenacao")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Estrutura curricular:</label>
                        <?php wp_editor($text_curricular, "text_curricular", array("textarea_name" => "text_curricular")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Documentos de interesse:</label>
                        <?php wp_editor($text_documentos, "text_documentos", array("textarea_name" => "text_documentos")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Egressos:</label>
                        <?php wp_editor($text_egressos, "text_egressos", array("textarea_name" => "text_egressos")); ?>
                    </p>
        <!--fim Submenu Programas-->
        <p>
            <label for="locationCourse"style="font-weight:800;font-size:18px;">Informações Academicas</label>
        </p>
        <!--inicio Submenu informaçoes academicas-->
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Calendário de Qualificações e Defesas:</label>
                        <?php wp_editor($text_qualifications_and_defenses, "text_qualifications_and_defenses", array("textarea_name" => "text_qualifications_and_defenses")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Aluno em regime especial:</label>
                        <?php wp_editor($text_student_in_special_scheme, "text_student_in_special_scheme", array("textarea_name" => "text_student_in_special_scheme")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Cronograma das aulas:</label>
                        <?php wp_editor($text_schedule_of_classes, "text_schedule_of_classes", array("textarea_name" => "text_schedule_of_classes")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Prova de Proficiência:</label>
                        <?php wp_editor($text_proof_of_proficiency , "text_proof_of_proficiency", array("textarea_name" => "text_proof_of_proficiency")); ?>
                    </p>
                    <p>
                        <label for="locationCourse"style="font-weight:800;font-size:18px;">Apoio FAPESP:</label>
                        <?php wp_editor($text_supported_by_fapesp, "text_supported_by_fapesp", array("textarea_name" => "text_supported_by_fapesp")); ?>
                    </p>
                    

        <!--fim Submenu informaçoes academicas-->
        <p>
            <label for="locationCourse"style="font-weight:800;font-size:18px;">Processos</label>
            <?php wp_editor($text_selection_process_phd, "text_selection_process_phd", array("textarea_name" => "text_selection_process_phd")); ?>
        </p>
        <p>
            <label for="locationCourse"style="font-weight:800;font-size:18px;">Produções</label>
            <?php wp_editor($text_productions_phd, "text_productions_phd", array("textarea_name" => "text_productions_phd")); ?>
        </p>


        <!-- RAIO X -->
        <p>
            <label for="durationCourse"style="font-weight:800;font-size:18px;">Titulação:</label>
            <input type="text" name="formation_phd" id="formation_phd" value="<?php echo $formation_phd; ?>" style="width:300px"/>
        </p>

        <p>
            <label for="hourCourse"style="font-weight:800;font-size:18px;">Duração:</label>
            <input type="text" name="hour_phd" id="hour_phd" value="<?php echo $hour_phd; ?>" style="width:300px"/>
        </p>
        <p>
            <label for="workloadCourse"style="font-weight:800;font-size:18px;">Entre em Contato: </label>
            <input type="text" name="workload_phd" id="workload_phd" value="<?php echo $workload_phd; ?>" style="width:300px"/>
        </p>

        <p>
            <label for="coordinatorCourse"style="font-weight:800;font-size:18px;">Fale com o Coordenador: </label>
            <input type="text" name="coordinator_phd" id="coordinator_phd" value="<?php echo $coordinator_phd; ?>" style="width:300px"/>       
        </p>
        <p>
            <label for="link_phd"style="font-weight:800;font-size:18px;">Link Inscrição:</label>
            <input type="text" name="link_phd" id="link_phd" value="<?php echo $link_phd; ?>" style="width:300px"/>
        </p>       
        <br>
        <hr>
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

    

        if (isset($_FILES["grid_phd"]) && $_FILES["grid_phd"]['name'] != "") {

            $upload = wp_handle_upload($_FILES["grid_phd"], array('test_form' => false));

            update_post_meta($postId, "grid_phd", $upload["url"]);
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